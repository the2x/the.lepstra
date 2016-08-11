<?php
    $split_order = explode('<br />', $order->order);

    echo "<table cellspacing='1' cellpadding='1'>";
    foreach ($split_order as $item){
        echo "<tr><td>" . $item . "</td></tr>";
    }
    echo "<tr>
            <td>
                Страна: ".$order->country."<br/>
                Город: ".$order->city." <br/>
                Дом: ".$order->house." <br/>
                Дробь: ".$order->shell." <br/>
                Квартира: ".$order->apartment." <br/>
                Индекс: ".$order->zip." <br/>
            </td>
          </tr>";
    echo "<tr><td>Общая стоймость: " . $order->cost . "</td></tr></table>";
?>
