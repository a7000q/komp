<?
$this->registerJsFile("/js/step5.js");
?>
<section id="step-scancards" class="active-step">
    <div class="wapper">
        <div class="center-content">
            <div class="title"><?=$activity->tStep->name?></div>
            <div class="center-elements">
                <button type="button" class="btn"><span></span></button>
            </div>
        </div>
    </div>
</section>

<?=$this->render('footer', ['activity' => $activity])?>