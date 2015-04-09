<?php
        session_start();

        if(!isset($_SESSION['username']))
        {
            ?>
                    <script type="text/javascript">
                        function redirect()
                            {
                                window.location="index.php";
                            }
                        alert("You have to login to view this page");
                        setTimeout(redirect(), 1000);
                    </script>
            <?php

        }
