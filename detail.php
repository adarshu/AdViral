<?php
include('shared.php');

$id = $_REQUEST["id"];

$resToShow = getHeader();

function getHeader()
{
    global $id;
    $res = "";
    $results = getAdsApi();
    $numrows = sizeof($results);
    if ($numrows > 0) {
        foreach ($results as $i => $ad) {
            if ($i + 1 == $id) {
                $res .= genItem($i, $ad);
            }
        }
    }
    return $res;
}

function genItem($i, $item)
{
    $res = "";
    $res .= "<div class='item2'>";
    $res .= "<div class='item2-left'>";
    $url = $item->url;
    $pic = $item->thumbnail;
    $res .= "<div class='pimg'><a href='$url'><img src='$pic' class='rowimg'/></a></div>";
    $res .= "<div class='ptitle'><a href='$url'>$item->title</a></div>";
    $item->body = truncateString($item->description, 250);
    $res .= "<div class='pbody'>$item->description</div>";
    $created = date('F j, Y', $item->timecreated);
    $res .= "<br/><br/><div style='display: inline'><span class='pstars'>Click Through: $item->ctr</span><span class='pdownloads'>$item->clicks clicks</span>|<span class='pdate'>Started $created</span></div>";
    $res .= "</div>";
    $res .= "</div>";
    return $res;
}


?>
<!DOCTYPE html>
<html>
<head>
    <title><?= AdVIRAL ?></title>
    <?php
    include 'head_inc.php';
    ?>
    <script src="_js/main.js"></script>
    <?php include "detail" . $id . ".php"; ?>
    <script type="text/javascript" src="_js/canvasjs.min.js"></script>
</head>

<body id="thebody">
<div class="homepage container">


    <ul class="nav nav-tabs" style="margin-top: 20px">
        <li class="active"><a href="#tabanalytics" data-toggle="tab">Analytics</a></li>
        <li><a class="previewtab" href="#tabpreview" data-toggle="tab">Ad Preview</a>
        <li><a class="settingstab" href="#tabsettings" data-toggle="tab">Settings</a>
        </li>
    </ul>

    <!-- Tab panes -->
    <div class="tab-content">
        <div class="tab-pane fade in active" id="tabanalytics">
            <?= $resToShow; ?>

            <div id="chartContainer" class="topgraph" style="height: 300px; width: 800px;">
            </div>

            <div id="chartContainerDonut" class="botgraph" style="height: 300px; width: 800px;">
            </div>
        </div>
        <div class="tab-pane fade" id="tabpreview"
             style="overflow:scroll; height:400px; overflow-x: hidden; overflow-x: hidden; overflow-y: hidden">
            <div class="well-sm">
                <img src="/img/preview<?= $id ?>.png"/>
            </div>
        </div>
        <div class="tab-pane fade" id="tabsettings"
             style="overflow:scroll; height:400px; overflow-x: hidden; overflow-y: hidden">
            <div class="well info">
                <h3>Enable Ad Networks:</h3>

                <div class="checkbox">
                    <label>
                        <input type="checkbox" checked> Facebook
                    </label>
                </div>
                <div class="checkbox">
                    <label>
                        <input type="checkbox" checked> Google
                    </label>
                </div>
                <div class="checkbox">
                    <label>
                        <input type="checkbox"> Twitter
                    </label>
                </div>
                <a class='btn btn-info' href='#' rel='' data-toggle='modal'>Update</a>
            </div>
        </div>
    </div>
</div>
</body>
</html>