<div class="clear"></div>
<div id="footer_bg" style="position: sticky;top: calc( 100vh - 100px );">
		<div id="footer">

				<!--column_3 for copyright and social starts-->
				<div class="column_3">
						<p>2021 © PhpMyCore <?= system_version; ?> | Developed by AngelRmz<br/>
								<a href="https://pmc.angelrmz.com/faq">FAQ</a> | <a href="https://pmc.angelrmz.com/docs">Documentation</a> | <a href="https://pmc.angelrmz.com/contact">Contact</a></p>
						<ul class="social">
								<!--<li><a href="#"><img src="images/apple.png" width="16" height="16" alt="apple"></a></li>-->
								<li><a href="https://www.facebook.com/angelrmzoficial/"><img src="images/facebook.png" width="16" height="16" alt="Facebook contact"></a></li>
								<!--<li><a href="#"><img src="images/googleplusone.png" width="16" height="16" alt="apple"></a></li>-->
						</ul>
				</div>
				<!--column_3 ends-->

				<!--column_3 for twitter starts
				<div class="column_3">
						<h4>Twitter feed</h4>
						<div id="twitter"></div>
				</div>-->
				<!--column_3 ends-->

				<!--column_3_last for subscribe starts
				<div class="column_3_last">
						<h4>Signup for news updates</h4>
						<div class="subscribe">
								<div class="sub_inner">
										<p>Enter your email address to signup now!</p>
										<form id="subform" method="post">
												<fieldset>
														<p>
																<input id="email" name="email" onfocus="if (this.value == 'Please enter your email to signup') {this.value = '';}" onblur="if (this.value == '') {this.value = 'Please enter your email to signup';}" value="Please enter your email to signup"  class="required email" />
														</p>
														<p>
																<input class="sub_submit" type="submit" value="Signup"/>
														</p>
												</fieldset>
										</form>
								</div>
						</div>
				</div>-->
				<!--column_3_last ends-->
		</div>
		<div class="clear"></div>
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
