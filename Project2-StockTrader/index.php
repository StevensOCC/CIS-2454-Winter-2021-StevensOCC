<!DOCTYPE html>
<html>
<head>
    <style>
        header{
            padding-top: 25px;
            padding-bottom: 50px;
            text-align: center;
        }
        header, h1{
            font-family: Garamond;
        }
        header, h2{
            font-family: sans-serif;
        }
        #MarketView{
            float: right;
        }
        #MarketTrade{
            float: left;
        }
        table{
            
        }
        th{
            border: 3px dotted black;
            border-collapse: collapse;
        }
        td{
            border: 1px solid black;
            border-collapse: collapse;
        }
    </style>
<?php
        require('./models/database.php');
        require('./models/stock_database.php');
        
        $action = filter_input(INPUT_POST, 'action');
        if ($action == NULL) {
            $action = filter_input(INPUT_GET, 'action');
            if ($action == NULL) {
                $action = 'list_stocks';
            }
        }

if ($action == 'list_stocks') {
    $symbol = filter_input(INPUT_GET, 'stock_symbol');
    if ($symbol == NULL) {
        $stocks = get_stocks();
    } else {
        $stocks = get_stocks_by_symbol($symbol);
    }
    require('./views/stocks.php');
} else if ($action == "add_stock") {
    $symbol = filter_input(INPUT_POST, 'stock_symbol');
    $price = filter_input(INPUT_POST, 'current_price', FILTER_VALIDATE_FLOAT);

    if ($symbol == null || $price == null) {
        $error = "missing symbol or price";
        include('./views/error.php');
    } else {
        add_stock($symbol, $price);
        header("Location: .");
    }
} else if ($action == "update_stock") {
    $symbol = filter_input(INPUT_POST, 'stock_symbol');
    $price = filter_input(INPUT_POST, 'current_price', FILTER_VALIDATE_FLOAT);

    if ($symbol == null || $price == null) {
        $error = "missing symbol or price";
        include('./views/error.php');
    } else {
        update_stock($symbol, $price);
        header("Location: .?stock_symbol=$symbol");
    }
}
?>
</head>
<body>
    <header>
        <h1>Simon Stevens and Co.</h1><h2>Stock Trading Services</h2>
    </header>
    <h1>Find Stock</hh1>
    
    
    <h1>Add Stock</h1>
</body>
</html>