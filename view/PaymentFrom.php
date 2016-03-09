<?php
    $hideAdditionalField = '';
    $autoSubmit = false;
    if (isset($data['autoSubmit']) && $data['autoSubmit']) {
        $autoSubmit = true;
        $hideAdditionalField = 'type="hidden"';
    }
?>

<form name="<?= $data['formName']; ?>" id="<?= $data['formId']; ?>" action="<?= $data['action']; ?>" method="<?= $data['method']; ?>">

    <input type="hidden" name="MNT_ID" value="<?= $data['accountId']; ?>">
    <input type="hidden" name="MNT_TRANSACTION_ID" value="<?= $data['orderId']; ?>">
    <input type="hidden" name="MNT_CURRENCY_CODE" value="<?= $data['currency']; ?>">
    <input type="hidden" name="MNT_AMOUNT" value="<?= $data['amount']; ?>">
    <input type="hidden" name="MNT_TEST_MODE" value="<?= $data['testMode']; ?>">
    <input type="hidden" name="MNT_SIGNATURE" value="<?= $data['signature']; ?>">
    <input type="hidden" name="MNT_SUCCESS_URL" value="<?= $data['successUrl']; ?>">
    <input type="hidden" name="MNT_FAIL_URL" value="<?= $data['failUrl']; ?>">

    <input type="hidden" name="MNT_PAY_SYSTEM" value="<?= $data['paySystem']; ?>">
    <input type="hidden" name="MNT_IS_REGULAR" value="<?= $data['isRegular']; ?>">
    <input type="hidden" name="MNT_FORM_METHOD" value="<?= $data['method']; ?>">

    <?php
        if (count($data['postData']) && is_array($data['postData'])) {
            foreach ($data['postData'] AS $varData) {
    ?>
        <?= $autoSubmit ? '' : $varData['name']; ?> <input <?= $hideAdditionalField; ?> type="text" name="<?= $varData['var']; ?>" value="<?= $varData['value']; ?>"><br/>
    <?php
            }
        }
    ?>

    <?php
        if (!$autoSubmit) {
    ?>
            <input type="submit" name="submit" value="Оплатить">
    <?php
        }
        else {
    ?>
            <script type="text/javascript">document.getElementById('<?= $data['formId']; ?>').submit();</script>
    <?php
        }
    ?>

</form>