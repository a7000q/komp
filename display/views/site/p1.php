<?
    use yii\bootstrap\ActiveForm;
    use yii\helpers\Url;
?>
<section id="step-start" class="active-step">
    <div class="wapper">
        <div class="center-content">
            <div class="title"><?=$activity->tStep->name?></div>
            <div class="center-elements">
                <?$form = ActiveForm::begin(['action' => Url::toRoute(['set-side'])])?>
                    <?foreach ($activity->sides as $side):?>
                        <button type="submit" class="btn icon1" name="side" value="<?=$side->id?>"><?=$side->name?></button>
                    <?endforeach;?>
                <? ActiveForm::end()?>
            </div>
        </div>
    </div>
</section>