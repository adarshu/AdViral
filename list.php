<?php
include('shared.php');
$activeMine = true;

$searchResToShow = getAds();

function getAds()
{
    $res = "";
    $results = getAdsApi();
//    echo json_encode($results);
    $numrows = sizeof($results);
    if ($numrows > 0) {
        foreach ($results as $i => $ad) {
            $res .= genItem($i, $ad);
        }
    } else {
        $res = "<h2>No ads found</h2>";
    }
    return $res;
}

function genItem($i, $item)
{
    $res = "";
    $res .= "<div class='item'>";
    $res .= "<div class='item-left'>";
    $url = $item->url;
    $pic = $item->thumbnail;
    $res .= "<div class='pimg'><a href='$url'><img src='$pic' class='rowimg'/></a></div>";
    $res .= "<div class='ptitle'><a href='$url'>$item->title</a></div>";
    $item->body = truncateString($item->description, 250);
    $res .= "<div class='pbody'>$item->description</div>";
    $created = date('F j, Y', $item->timecreated);
    $res .= "<br/><br/><div style='display: inline'><span class='pstars'>Click Through: $item->ctr</span><span class='pdownloads'>$item->clicks clicks</span>|<span class='pdate'>Started $created</span></div>";
    $res .= "<a class='btn btn-warning btn-sm pull-right' href='#' style='margin-left: 30px;margin-top: -10px'>Stop Campaign</a>";
    $res .= "";
    $res .= "</div>";
    $res .= "</div>";
    return $res;
}

//handle form actions
if (isset($_POST["action"])) {
    $action = $_POST["action"];
    $uuid = $_POST["uuid"];
}

?>
<!DOCTYPE html>
<html>
<head>
    <title><?= APPNAME ?></title>
    <?php include 'head_inc.php'; ?>
    <script src="_js/main.js"></script>
</head>

<body>
<!--<div class="bg"><img src="img/bg3.png"/></div>-->
<div class="homepage container">
    <div style="">
        <div class="page-title" style="display: inline">My Ads</div>
        <div style="float: right; margin-top: 20px">
            <a class='btn btn-danger btn-lg sell-btn' href='#addModal' rel='' data-toggle='modal'>Create an Ad</a>
        </div>
    </div>

    <div id="results" style="padding-top: 20px">
        <div id="search_results">
            <? echo $searchResToShow ?>
        </div>

        <div class="modal fade" id="addModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Create a new Ad</h4>
                    </div>
                    <div class="modal-body">
                        <div class='form-row'>
                            <div class='col-xs-12 form-group  required'>
                                <label class='control-label'>Title</label>
                                <input class='form-control' placeholder=''
                                       size='300' type='text' value='Ying Yang Chinese Food'>
                            </div>
                        </div>
                        <div class='form-row'>
                            <div class='col-xs-12 form-group  required'>
                                <label class='control-label'>Description</label>
                                <input class='form-control description' placeholder=''
                                       size='300' type='text' value='Voted the Best Chinese Restaurant in San Francisco in 2013.  25% off any entree!'>
                            </div>
                        </div>
                        <div class='form-row'>
                            <div class='col-xs-12 form-group  required'>
                                <label class='control-label'>Picture URL</label>
                                <input class='form-control description' placeholder=''
                                       size='300' type='text' value='/img/food3.jpg'>
                                <form action="" method="post" enctype="multipart/form-data" style="margin-top: 20px">
                                    <input type="file" name="file" id="file"><br>
                                </form>
                            </div>
                        </div>
                        <div class='form-row'>
                            <div class='col-xs-4 form-group  required'>
                                <label class='control-label'>Age Range</label>
                                <input autocomplete='off' class='form-control age-range'
                                       placeholder='' size='5' type='text'
                                       value="13 and up">
                            </div>
                            <div class='col-xs-4 form-group  required'>
                                <label class='control-label'>Location</label>
                                <input class='form-control location' placeholder=''
                                       size='5' type='text' value='San Francisco'>
                            </div>
                            <div class='col-xs-4 form-group  required'>
                                <label class='control-label'>Tags</label>
                                <input class='form-control tags' placeholder=''
                                       size='4' type='text' value='chinese food'>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-success sell-confirm">List Ad</button>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
</body>
</html>