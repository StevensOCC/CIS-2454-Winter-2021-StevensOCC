<!DOCTYPE html>
<?php include "./views/header.php"; ?>
<body>
    <?php include "./views/navigation.php"; ?>

    <h1>Stock list</h1>
    <table>
        <th>Symbol</th>
        <th>Current Price</th>
        <?php foreach ($stocks as $stock) : ?>
            <tr>
                <td><?php echo $stock['symbol']; ?> </td>
                <td><?php echo $stock['currentPrice']; ?></td>
            </tr>
        <?php endforeach; ?>
    </table>

    <h2>Find Stock</h2>
    <form action="index.php" method="get">
        <div id="data">
            <label>Stock Symbol</label>
            <select name="stock_symbol">
                <option value=''></option>
                <?php foreach ($allStocks as $stock) : ?>
                    <option value='<?php echo $stock['symbol']; ?>'><?php echo $stock['symbol']; ?></option><?php echo $stock['symbol']; ?>
                <?php endforeach; ?>
            </select>
            <input type="hidden" name="action" value="list_stocks" />

        </div>
        <div id="buttons">
            <label>&nbsp;</label>
            <input type="submit" value="Find"><br>
        </div>
    </form>

    <h2>Add Stock</h2>
    <form action="index.php" method="post">
        <div id="data">
            <label>Stock Symbol</label>
            <input type="text" name="stock_symbol"><br>
            <label>Current Price</label>
            <input type="text" name="current_price"><br>
            <input type="hidden" name="action" value="add_stock" />

        </div>
        <div id="buttons">
            <label>&nbsp;</label>
            <input type="submit" value="Add"><br>
        </div>
    </form>

    <h2>Update Stock Price</h2>
    <form action="index.php" method="post">
        <div id="data">
            <label>Stock Symbol</label>
            <select name="stock_symbol">
                <?php foreach ($allStocks as $stock) : ?>
                    <option value='<?php echo $stock['symbol']; ?>'><?php echo $stock['symbol']; ?></option><?php echo $stock['symbol']; ?>
                <?php endforeach; ?>
            </select>
            <label>Current Price</label>
            <input type="text" name="current_price"><br>
            <input type="hidden" name="action" value="update_stock" />

        </div>
        <div id="buttons">
            <label>&nbsp;</label>
            <input type="submit" value="Update"><br>
        </div>
    </form>
    <?php include './views/footer.php'; ?>