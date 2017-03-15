<section id="step-final" class="active-step">
    <div class="wapper">
        <div class="center-content">
            <div class="title-success title">Спасибо за вашу покупку.<br>хорошего вам пути!</div>
            <div class='blue-block'>
                <span class="name">Колонка №</span>
                <span class="value"><?=$activity->side->name?></span>
            </div>
            <div class='blue-block'>
                <span class="name">Вид топлива</span>
                <span class="value"><?=$activity->address->product->name?></span>
            </div>

            <div class="success-action"><?=$activity->successText?></div>
        </div>
    </div>
</section>

<?=$this->render('footer', ['activity' => $activity])?>