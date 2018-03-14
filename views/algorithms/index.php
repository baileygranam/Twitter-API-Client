<h2>The algorithms are:</h2>
<table>
  <tr>
    <th>Name</th>
    <th>Selection</th>
  </tr>
<?php foreach($this->algorithms as $algorithm) { ?>
  <tr>
    <td><?=$algorithm['algorithm']?></td>
    <td><a href='?controller=algorithms&action=show&id=<?=$algorithm['id']?>'>Check Ranking</a></td>
  </tr>
<?php } ?>
</table>