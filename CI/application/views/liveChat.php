<div class="container my-5 text-center" style=" max-width: calc(300px + 1rem + 420px);">
  <h1><?php echo $liveChat?></h1>
  <div class="alert alert-info alert-dismissible fade show" role="alert">
    <?php echo $message?>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  <div id="live-chat-container" style="height: 60vh;">
    <div class="spinner-grow text-primary mt-5" role="status">
      <span class="sr-only"><?php echo $loading?></span>
    </div>
  </div>
</div>

<script type="text/javascript">
// load talkjs cdn
(function(t,a,l,k,j,s){
s=a.createElement('script');s.async=1;s.src="https://cdn.talkjs.com/talk.js";a.head.appendChild(s)
;k=t.Promise;t.Talk={v:3,ready:{then:function(f){if(k)return new k(function(r,e){l.push([f,r,e])});l
.push([f])},catch:function(){return k&&new k()},c:l}};})(window,document,[]);

Talk.ready.then(() => {
  const me = new Talk.User(
    <?php echo json_encode(array(
      "id" => $_SESSION['username'],
      "name" => $_SESSION['username'],
      "email" => $_SESSION['email'],
      "welcomeMessage" => "Hey, let's have a chat!",
      "role" => "visitor",
      "locale" => strcmp($this->session->userdata('language'), 'english') == 0 ? 'en-US' : 'zh-CN'
    )); ?>
  )

  const { auth, staffInfo } = liveChatConfig

  const talkSession = new Talk.Session({
    appId: auth.appId,
    me,
  });

  let inbox;

  if (me.name !== staffInfo.name) {
    // current user is normal user seeking for help
    const staff = new Talk.User({
      id: staffInfo.name,
      name: staffInfo.name,
      email: staffInfo.emial,
      welcomeMessage: 'Hey, how can I help?',
      role: 'visitor',
    });

    const conversation = talkSession.getOrCreateConversation(
      Talk.oneOnOneId(me, staff)
    );

    conversation.setParticipant(me);
    conversation.setParticipant(staff);

    inbox = talkSession.createInbox({ 
      selected: conversation,
      showTranslationToggle: true,
    });

  } else {
    // current user is staff / customer service
    inbox = talkSession.createInbox({
      showTranslationToggle: true,
    })
  }

  inbox.mount(document.getElementById('live-chat-container'));
  
});
</script>