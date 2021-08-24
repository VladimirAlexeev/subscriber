<!DOCTYPE html>
<html>
<style>
    table, th, td {
        border:1px solid black;
    }
</style>
<body>

<h2>List of all emails!</h2>

<table style="width:100%">
    <tr>
        <th>ID</th>
        <th>Email</th>
        <th>Host</th>
        <th>Location</th>
        <th>Create date</th>
    </tr>
    <?php foreach ($emailList as $email) :?>
    <tr>
        <td><?php echo ($email['id']); ?></td>
        <td><?php echo $email['email']; ?></td>
        <td><?php echo $email['host']; ?></td>
        <td><?php echo $email['location']; ?></td>
        <td><?php echo $email['date']; ?></td>
    </tr>
    <?php endforeach; ?>
</table>
</body>
</html>
