<script type="text/javascript">
 
    function display(id){  
        var traget=document.getElementById(id);  
        if(traget.style.display=="none"){  
            traget.style.display="";  
        }else{  
            traget.style.display="none";  
      }  
   }  
</script>

<div class="d-flex">
    <div id="panel" class="d-flex flex-column justify-content-start"style="width: 300px; height: 500px; border: 1px solid black">
        <button class="btn btn-block align-self-end" style="width: 50px;"onclick="display('abc')">☰</button>
    </div>
    <div id="abc" style="display: none; width: 300px; height: 500px; border: 1px solid black">
            hello
    </div>
</div>








     