<!DOCTYPYE html>
    <html>

    <head>
        <meta charset="UTF-8">
        <title>新增館別</title>
        <style>
            .border {
                border: 1px solid;
            }
        </style>
    </head>

    <body>
    <?php require_once './templates/title.php';?>
        <form name="myForm" method="POST" action="musInsert.php" enctype="multipart/form-data">
            <table class="border">
                <thead>
                    <tr>
                        <th class="border">美術館編號</th>
                        <th class="border">美術館編號</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="border">
                            <input type="text" name="museumId" id="museumId" value="" maxlength="10" />
                        </td>
                        <td class="border">
                            <input type="text" name="museumName" id="museumName" value="" maxlength="20" />
                        </td>
                    </tr>
                </tbody>
                <tfoot>
                    <tr>
                        <td class="border" colspan="7"><input type="submit" name="smb" value="新增"></td>
                    </tr>
                </tfoot>
            </table>
        </form>

    </body>

    </html>