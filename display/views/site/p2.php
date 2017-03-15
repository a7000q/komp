<?
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;

$this->registerJsFile("/js/step2.js");
?>

<section id="step-select-fuel" class="active-step">
    <div class="wapper">
        <div class="center-content">
            <div class="title"><?=$activity->tStep->name?></div>
            <div class="center-elements">
                <?$form = ActiveForm::begin(['action' => Url::toRoute(['set-address'])])?>
                    <?foreach ($activity->addresses as $address):?>
                        <button type="submit" class="btn <?=$address->tStatus->name?>-icon btn-fuel" name="address" value="<?=$address->id?>">
                            <?=$address->product->name?>
                        </button>
                    <?endforeach;?>
                <? ActiveForm::end()?>
            </div>
        </div>
    </div>
</section>

<?=$this->render('footer', ['activity' => $activity])?>