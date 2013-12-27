<div class="container">

  <!-- Example row of columns -->

  <h2>The Most Amazing Personal Time Calculator:</h2>

  <div style="clear: both;">
    <div style="clear: both;">
        <div class="item">
            <label for="work">Working:</label>
            <input type="text" id="work" class="hours" value="<?php echo (!empty($formData['work'])?$formData['work']:8.8);?>" readonly>
            <div id="slider-work"></div>
        </div>
        <div class="item">
            <label for="sleep">Sleeping:</label>
            <input type="text" id="sleep" class="hours" value="<?php echo (!empty($formData['sleep'])?$formData['sleep']:7.7);?>" readonly>

            <div id="slider-sleep"></div>
        </div>
        <div class="item">
            <label for="leisure">Leisure:</label>
            <input type="text" id="leisure" class="hours" value="<?php echo (!empty($formData['leisure'])?$formData['leisure']:2.6);?>" readonly>

            <div id="slider-leisure"></div>
        </div>
    </div>

    <div>
        <span id="instruction" class="instruction">Hey -- why Don't You Drag The Sliders..</span><br>
        <span id='free'></span> Free Daily Hours<br>
        <span id='error' style='display: none;'>Overall value cannot be more than 24 hours</span><br>
        Weekly: <span id='free_weekly'></span>

        Monthly: <span id='free_monthly'></span>
        <br>
        Yearly: <span id='free_yearly'></span>

        Life: <span id='free_life'></span>
    </div>

    <div style="clear: both;">

        <div class="item">
            <label for="care">Care:</label>
            <input type="text" id="care" class="hours" value="<?php echo (!empty($formData['care'])?$formData['care']:2.8);?>" readonly>

            <div id="slider-care"></div>
        </div>
        <div class="item">
            <label for="eat">Nourish:</label>
            <input type="text" id="eat" class="hours" value="<?php echo (!empty($formData['eat'])?$formData['eat']:1.1);?>" readonly>

            <div id="slider-eat"></div>
        </div>
        <div class="item">
            <label for="house">House:</label>
            <input type="text" id="house" class="hours" value="<?php echo (!empty($formData['house'])?$formData['house']:1.0);?>" readonly>

            <div id="slider-house" class="hours"></div>
        </div>

    </div>
</div>

<div id="step2" style="display: none; clear: both;">
    <span class="instruction" style="display: inline-block;">Would you like to see what you can do with your Free Time?</span><br>
    <ul id="items">
        <?php foreach ($plans as $plan) : ?>
            <li>
                <input data-id="<?= $plan['plan_id'] ?>" type="checkbox" class="citems" value="<?= $plan['time'] ?>" /><span><?= ' '. $plan['description'] . '  :  ' . $plan['time'] . '   ' .'hours'?></span>
            </li>
        <?php endforeach; ?>
    </ul>
    <div id="items-checkpoints" class="success" style="display:none;">
    </div>

    <?php if(!$user):?>
        <input type="button" class="btn btn-primary btn-lg" id="saveGoal" value="Register and Save" style="display: none" onclick="" /><br><br>
    <?php else: ?>
        <input type="button" id="saveGoal" class="btn btn-primary" value="Save your goal" style="display: none" /><br><br>
    <?php endif; ?>

    <script type="text/javascript">
        var logged = false;
        <?= isset($user) ? 'logged = true' : ''; ?>
    </script>

    <span id="saveGoal-result" class="success large"></span>
</div>

<div class="research">
    <input type="button" id='showAssumption' value='Research And Assumptions' />
    <input type="button" id='hideAssumption' value='Hide: Research And Assumptions' style="display: none" />
    <div id='assumption'>
    </div>
</div>

</div>