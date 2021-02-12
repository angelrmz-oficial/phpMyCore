<div id="footer">
  <div id="wrapFooter">
    <p id="copyright">Copyright &copy; phpMyCore v<?= system_version; ?>. All rights reserved.</p>
    <p id="author">Developed by: <a href="#">AngelRmz</a></p>
  </div>
</div>
<script type="text/javascript">
var Form = {
  Load: function(formName, data = null){
    //$("#sidebar").hide();
    $("#formLoad").load('load.'+formName+'.php', data, function(){
      $("#sidebar").show();
    });
  },
  Post: function(formName, data = null){
    $.post('post.'+formName+'.php', data, function(r){
      alert(r.message);
      if(r.success){
        location.reload();
      }
    }, 'json');
  }
}

$('body').delegate('form','submit',function(event){
  event.preventDefault();
  if($(this).attr("action") !== ""){
    return true;
  }
  var submit = $(this).find('button[type=submit]');
  if(!submit.length){
    submit = $(this).find('input[type=submit]');
  }
  submit.attr('disabled', 'disabled');
  var formData = new FormData(this);

//select2('val'
  var select = $(this).find("select");
  select.each(function(){
    if($(this).hasClass('select2')){
      formData.delete($(this).attr('name'));
      $.each($(this).serializeArray(), function( i, field ) {
        formData.append(field.name+"["+i+"]", field.value);
      });
    }
  });

  var checkboxs = $(this).find("input[type=checkbox]");
  checkboxs.each(function(){ formData.delete($(this).attr('name')); });
  checkboxs.each(function(){
    formData.append($(this).attr('name'), $(this).is(':checked') ? "on" : "off");
  });
  var data = {};
  formData.forEach((value, key) => {data[key] = value});
  $.post('post.'+submit.attr('name')+'.php', data, function(r){
    alert(r.message);
    if(r.success){
      location.reload();
    }
    else{
      submit.removeAttr('disabled');
    }
  }, 'json');

});
</script>
