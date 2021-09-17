<div class="container my-5">
  <div class="btn-lang my-5">
    <button class="btn btn-block btn-primary btn-en">Set language to English</button>
    <button class="btn btn-block btn-info btn-zh">设置语言为中文</button>
  </div>
  <div id="live-chat-container" style="height: 500px">
    <i>Loading chat...</i>
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
      "role" => "visitor"
    )); ?>
  )

  const talkSession = new Talk.Session({
    appId: 't2eRiOSl',
    me,
  });

  let inbox;

  if (me.name !== 'stephen') {
    // current user is normal user seeking for help
    const staff = new Talk.User({
      id: 'stephen',
      name: 'stephen',
      email: 'stephen.yin@outlook.com',
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

  // set language options
  const languageBtn = document.querySelector('.btn-lang')

  languageBtn.addEventListener('click', (e) => {
    const url = `https://api.talkjs.com/v1/t2eRiOSl/users/${me.id}`

    const data = {
      ...me,
      email: [me.email],
      locale: e.target.matches('.btn-en') ? 'en-US' : 'zh-CN'
    }

    fetch(url, {
      method: 'PUT',
      body: JSON.stringify(data),
      headers: new Headers({
        'Content-Type': 'application/json',
        'Authorization': 'Bearer sk_test_wF1J15J2VZIBIlbwNQzFKqWL7goGGdln'
      })
    })
      .then(res => res.json())
      .catch(error => console.error('Error:', error))
      .then(response => {
        console.log('success', response)
        
        document.querySelector('#live-chat-container > iframe').src += ''
      });

  })
  
});
</script>