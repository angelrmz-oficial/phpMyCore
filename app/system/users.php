<?php require 'logged.php';
if(!in_array("users", $userApp['permissions']))
  redirect('app/system/error.php?type=unauthorized');

$page['id']=2;
$page['title']="Users | phpMyCore | ". site_name;
require 'head.php'; //withoutSubnav - withSubnav
?>
<body id="pageTable" class="withoutSubnav">
    <div id="wrapper">
        <?php require 'menu.php'; ?>
        <div id="content" class="clear">
            <div id="main" class="clear">
                <div id="head" class="clear">
                    <h1>Cuentas de sistema</h1>
                    <div id="actions">
                        <!-- <a href="#" class="button secondary">Delete items</a>
                        <a href="#" class="button secondary">Export items</a> -->
                        <button type="button" onclick="Form.Load('adduser')" class="button primary">Add user</button>
                    </div>
                </div>
                <div id="topOptions" class="clear">
                    <form id="formBulkActions" action="#" method="get">
                        <div id="bulkActions">
                            <label for="selBulkActions">Selected items:</label>
                            <select id="selBulkActions">
                                <option selected="selected">- choose action -</option>
                                <option>delete</option>
                                <option>deactivate</option>
                                <option>activate</option>
                                <option>export</option>
                            </select>
                        </div>
                    </form>
                    <!-- <ul class="pagination">
                        <li class="button small pagePrev"><a href="#" title="Previous page">Previous</a></li>
                        <li class="first"><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li class="active"><a href="#">3</a></li>
                        <li>...</li>
                        <li><a href="#">7</a></li>
                        <li class="last"><a href="#">8</a></li>
                        <li class="button small pageNext"><a href="#" title="Next page">Next</a></li>
                    </ul> -->
                </div>
                <!-- sortable sorted desc
                <a href="#"><img src="img/ico/icoStatusGreen.png" alt="Active"></a>
                -->
                <table id="tableItems" class="clear" cellpadding="0" cellspacing="0">
                    <thead>
                        <tr>
                            <th class="colCheck"><input id="cbSelectAll" type="checkbox"></th>
                            <th class="colName left">Username</th>
                            <th class="colStatus">Permissions</th>
                            <th class="colCount">Last IP</th>
                            <th class="colPosition">Last Connection</th>
                            <th class="colActions right">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                      <?php $tr="odd"; foreach ($app['users'] as $user): ?>
                        <tr class="<?= $tr; ?>">
                            <td class="colCheck"><input name="cbSelect[]" type="checkbox"></td>
                            <td class="colName left">
                              <a href="javascript:Form.Load('edituser', {username: '<?= $user['username']; ?>'})">
                                <?= $user['username']; ?>
                              </a>
                            </td>
                            <td class="colStatus"><?= implode(", ", $user['permissions']); ?></td>
                            <td class="colCount"><?= $user['last_ip']; ?></td>
                            <td class="colPosition"><?= $user['last_connection']; ?></td>
                            <td class="colActions right">
                                <a class="actionEdit" href="javascript:Form.Load('edituser', {username: '<?= $user['username']; ?>'})">Edit</a>
                                <a class="actionDelete" href="javascript:confirm('¿Seguro que desea eliminar el usuario <?= $user['username']; ?>?') ? Form.Post('deleteuser', {username: '<?= $user['username']; ?>'}) : void(0);">Delete</a>
                            </td>
                        </tr>
                        <?php $tr=($tr=="odd") ? "even" : "odd"; endforeach; ?>
                    </tbody>
                </table>
                <!-- <div id="bottomOptions" class="clear">
                    <form id="formViewOptions" action="#" method="get">
                        <div id="viewOptions">
                            <label for="selItemsPerPage">Items per page:</label>
                            <select id="selItemsPerPage">
                                <option selected="selected">10</option>
                                <option>25</option>
                                <option>50</option>
                                <option>100</option>
                            </select>
                        </div>
                    </form>
                    <ul class="pagination">
                        <li class="button small pagePrev"><a href="#" title="Previous page">Previous</a></li>
                        <li class="first"><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li class="active"><a href="#">3</a></li>
                        <li>...</li>
                        <li><a href="#">7</a></li>
                        <li class="last"><a href="#">8</a></li>
                        <li class="button small pageNext"><a href="#" title="Next page">Next</a></li>
                    </ul>
                </div> -->
            </div>
            <div id="sidebar" style="display:none">
                <div id="boxFirst" class="sidebox clear">
                    <h1>Formulario</h1>
                    <div id="formLoad" class="boxContent clear">

                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php require 'footer.php'; ?>
</body>
</html>
