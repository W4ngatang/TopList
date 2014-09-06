<? if ($positions != NULL): ?>
<div>
    <? foreach ($positions as $position): ?>
    <table class="table table-striped">
        <tr>
            <th class="rank">Rank</th>
            <th class="response2">Your Top Ten <?= $position["question"] ?></th>
            <th class="community">Community Top Ten <?= $position["question"] ?></th>
        </tr>
        <? for ($i = 0; $i < 10; $i++): ?>
            <tr>
                <td class="rank">#<?= $i+1 ?></td>
                <td class="response2"><?= $position[$i] ?></td>
                <td class="community"><?= $aggregates[$position["question"]][$i + 1]["response"] ?></td>
            </tr>
        <? endfor ?>
    </table>
</div>
<br/>
    <? endforeach ?>
<? else: ?>
    <div><? print("You haven't made any lists!") ?></div>
<? endif ?>
<br/>
    <a href="logout.php">Log Out</a>
