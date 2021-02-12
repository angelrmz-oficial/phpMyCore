<?php require 'logged.php';
if(!in_array("system", $userApp['permissions']) || !in_array("site", $userApp['permissions']) || !in_array("router", $userApp['permissions']) || !in_array("mysql", $userApp['permissions']))
  redirect('app/system/error.php?type=unauthorized');

$page['id']=3;
$page['subid']=0;
$page['title']="Settings | phpMyCore | ". site_name;
require 'head.php';
?>

<body id="pageForm" class="withSubnav">
  <div id="wrapper">
      <?php require 'menu.php'; ?>
      <div id="content" class="clear">
          <div id="main" class="clear">
              <div id="head" class="clear">
                  <h1>Form</h1>
                  <div id="actions">
                      <a href="table.html" class="button secondary">Cancel</a>
                      <a href="table.html" class="button primary">Save changes</a>
                  </div>
                  <!-- end page actions-->
              </div>

          </div>
          <div id="sidebar">
              
              <div id="help" class="sidebox">
                  <h1>Context help</h1>
                  <div class="boxContent clear">
                      <h2>Topic 1</h2>
                      <p>
                          Lorem ipsum dolor sit amet consectetuer diam dis non ut aliquam.
                          Lorem nibh Pellentesque ut nibh Nunc Suspendisse ut nibh dignissim hac.
                          Nunc augue aliquet tempus non condimentum eget nibh Maecenas elit et.
                      </p>
                      <h2>Topic 2</h2>
                      <p>
                          Lorem ipsum dolor sit amet consectetuer diam dis non ut aliquam.
                          Lorem nibh Pellentesque ut nibh <a href="#">Nunc Suspendisse</a> ut nibh dignissim hac.
                          Nunc augue aliquet tempus non condimentum eget nibh Maecenas elit et.
                      </p>
                  </div>
              </div>
          </div>
      </div>
  </div>
  <?php require 'footer.php'; ?>
</body>
</html>
