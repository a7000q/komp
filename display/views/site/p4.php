<?
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;

$this->registerJsFile("/js/step4.js");
?>

<section id="step-balance" class="active-step">
    <div class="wapper">
        <div class="center-content">
            <div class="title"><?=$activity->tStep->name?></div>
            <div class="center-elements">
                <div class="money-screen">
                    <span>Баланс</span>
                    <input type="text" name="enter-money" required value="0.0" placeholder="0.0" pattern="\d+"
                           maxlength="14" disabled id="money-display">
                </div>
                <div class="selected-fuel">
                    <span class="active"><?=$activity->address->product->name?></span>
                    <span class="active" style="background:#e21e24"><?=$activity->address->product->price?> ₽</span>
                </div>
            </div>
        </div>
    </div>
</section>

<?=$this->render('footer', ['activity' => $activity])?>