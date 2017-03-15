<?
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;
?>

<section id="step-select-money" class="active-step">
    <div class="wapper">
        <div class="center-content">
            <div class="title"><?=$activity->tStep->name?></div>
            <div class="center-elements">
                <?$form = ActiveForm::begin(['action' => Url::toRoute(['set-pay'])])?>
                    <?foreach ($activity->pays as $pay):?>
                        <button type="submit" class="btn" name="pay" value="<?=$pay->id?>"><?=$pay->name?></button>
                    <?endforeach;?>
                <? ActiveForm::end()?>
            </div>
        </div>
    </div>
</section>

<?=$this->render('footer', ['activity' => $activity])?>