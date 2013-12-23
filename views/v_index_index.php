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
                <li>
                    <input type="checkbox" class="citems" value="10000" /><span>Read a 1,000 Books: 10,000hr</span>
                </li>
                <li>
                    <input type="checkbox" class="citems" value="20000" /><span>Run 100 Marathons: 20,000hr</span>
                </li>
                <li>
                    <input type="checkbox" class="citems" value="20000" /><span>Watch 10,000 Movies:20,000hr</span>
                </li>
                <li>
                    <input type="checkbox" class="citems" value="200" /><span>Take a Coursera course:200hr</span>
                </li>
                <li>
                    <input type="checkbox" class="citems" value="1000" /><span>Learn A Language: 1,000hr</span>
                </li>
                <li>
                    <input type="checkbox" class="citems" value="2000" /><span>Complete a Graduate degree: 2,000hr</span>
                </li>
            </ul>
            <div id="items-checkpoints" class="success" style="display:none;">
            </div>

            <?php if(!$user):?>
                <input type="button" id="saveGoal" value="Register and Save" style="display: none" onclick="" /><br><br>
                <?php $saveUrl = "/schedules/p_add_to_session"; ?>
            <?php else: ?>
                <input type="button" id="saveGoal" value="Save your goal" style="display: none" /><br><br>
                <?php $saveUrl = "/schedules/p_add"; ?>
            <?php endif; ?>


            <script type="text/javascript">
                function delayerRedirect(){
                    window.location = "/users/signup";
                }
                function saveData() {

                    var citems = $('input:checkbox:checked.citems').map(function () {
                      return this.value;
                    }).get();     
                    $.post( '<?php echo $saveUrl; ?>', {
                        work: $("#work").val(),
                        sleep: $("#sleep").val(),
                        leisure: $("#leisure").val(),
                        care: $("#care").val(),
                        eat: $("#eat").val(),
                        house: $("#house").val(),
                        items: citems,
                        goals: $("#items-checkpoint").val()
                    });

                    <?php if(!$user):?>
                        // redirect to sign up page after 2 seconds
                        setTimeout('delayerRedirect()', 2000);
                    <?php else: ?>
                        // show here div with Congratulation message
                        $("#saveGoal-result").html('You have successfully saved your goal!').show();
                    <?php endif; ?>
                }

                $("#saveGoal").click(function(){
                    saveData();
                });
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