<?php
    use \koolreport\widgets\koolphp\Table;
    use \koolreport\widgets\google\ColumnChart;

    $data = array(
        array("category"=>"Books","sale"=>32000,"cost"=>20000,"profit"=>12000),
        array("category"=>"Accessories","sale"=>43000,"cost"=>36000,"profit"=>7000),
        array("category"=>"Phones","sale"=>54000,"cost"=>39000,"profit"=>15000),
        array("category"=>"Movies","sale"=>23000,"cost"=>18000,"profit"=>5000),
        array("category"=>"Others","sale"=>12000,"cost"=>6000,"profit"=>6000)
    );
?>
<html>
    <head>
        <title>KoolReport's Widgets</title>
    </head>
    <body>
    <body>
        <?php
        Table::create(array(
            "dataSource"=>$data
        ));
        ?>
        <?php
        ColumnChart::create(array(
            "dataSource"=>$data
        ));
        ?>
    </body>
</html>
