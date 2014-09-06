<!-- if there are lists to display, this would only not happen if no list had been created -->
<? if ($aggregates != ""): ?>
    <!-- use PHP foreach and for loops to quickly display lists and the top ten responses -->
    <? foreach ($aggregates as $aggregate): ?>
    
    <table class="table table-striped">
        <tr>
            <th class="rank">Rank</th>
            <th class="response">Top Ten <?= $aggregate[0] ?></th>
        </tr>
        <? for ($i = 1; $i <= 10; $i++): ?>
            <tr>
                <td class="rank">#<?= $i ?></td>
                <td class="response"><?= $aggregate[$i]["response"] ?></td>
            </tr>
        <? endfor ?>    
    </table>
    <br/>
    
    <? endforeach ?>
 <? else: ?>
    <div><? print("No lists at this time!") ?></div>
    <br/>
<? endif; ?>
    <a href="logout.php">Log Out</a>
