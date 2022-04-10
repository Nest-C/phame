<div class="col-md-3 mb-3 border  hover-shadow">
        <div class="bg-image hover-zoom" style=" height: 30vh;">
            <img src="images/<?=$rs['img_name']?>" />
        </div>
        <div
            class="teal"
            align="center"
            style="
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
            "
        >
            <?=$rs['pd_name']?>
        </div>
        <div style="padding: 10px" class="divider">
            <div style="color: red; font-weight: bold"></div>
        </div>
        <div align="center">
            <br />
            <span
            class="btn orange"
            onclick="go('product_detail.php?pdid=<?=$rs['pd_id']?>');"
            >ดูรายละเอียด</span
            >&nbsp;
        </div>
    </div>
    
