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
    $res .= "<div class='pimg'><a href='$url'><img src='/img/app_logo.png' style='height: 200px'/></a></div>";
    $res .= "<div class='ptitle'><a href='$url'>$item->title</a></div>";
    $item->body = truncateString($item->description, 250);
    $res .= "<div class='pbody'>$item->description</div>";
    $created = date('F j, Y', $item->timecreated);
    $stars = genStars($item->rating);
    $res .= "<br/><br/><div style='display: inline'><span class='pstars'>$stars</span><span class='pdownloads'>$item->clicks click</span>|<span class='pdate'>Updated $created</span></div>";
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
<div class="bg"><img src="img/bg3.png"/></div>
<div class="homepage container">
    <div style="padding-top: 40px;">
        <div class="page-title" style="display: inline">My Ads</div>
        <div style="float: right; margin-top: 20px">
            <a class='btn btn-success btn-lg sell-btn' href='#addModal' rel='' data-toggle='modal'><span
                    class="glyphicon glyphicon-plus"></span></a>
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
                                <input class='form-control title' placeholder=''
                                       size='100' type='text' value=''>
                            </div>
                        </div>
                        <div class='form-row'>
                            <div class='col-xs-12 form-group  required'>
                                <label class='control-label'>Description</label>
                                <input class='form-control description' placeholder=''
                                       size='100' type='text' value=''>
                            </div>
                        </div>
                        <div class='form-row'>
                            <div class='col-xs-12 form-group  required'>
                                <input type="file" name="picture" id="picture"><br>
                            </div>
                        </div>
                        <div class='form-row'>
                            <div class='col-xs-4 form-group  required'>
                                <label class='control-label'>Price</label>
                                <input autocomplete='off' class='form-control sell-price'
                                       placeholder='' size='5' type='text'
                                       value="">
                            </div>
                            <div class='col-xs-4 form-group  required'>
                                <label class='control-label'>Location</label>
                                <input class='form-control location' placeholder=''
                                       size='5' type='text' value=''>
                            </div>
                            <div class='col-xs-4 form-group  required'>
                                <label class='control-label'>Tags</label>
                                <input class='form-control tags' placeholder=''
                                       size='4' type='text' value=''>
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