<!-- if there is data for user's lists, then display them -->
<? if ($positions != NULL): ?>
    <!-- use PHP foreach and for loops to print each list and the ten responses off quickly -->
    <? foreach ($positions as $position): ?>
    
    <table class="table table-striped">
        <tr>
            <th class="rank">Rank</th>
            <th class="response">Top Ten <?= $position["question"] ?></th>
        </tr>
        <? for ($i = 0; $i < 10; $i++): ?>
            <tr>
                <td class="rank">#<?= $i+1 ?></td>
                <td class="response"><?= $position[$i] ?></td>
            </tr>
        <? endfor ?>
    </table>
    <br/>
    
    <? endforeach ?>
<? else: ?>
    <div><? print("You haven't made any lists!") ?></div>
<? endif ?>
<br/>
    <a href="logout.php">Log Out</a>
