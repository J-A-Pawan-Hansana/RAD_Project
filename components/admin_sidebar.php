<?php

if (isset($message)) {
    foreach ($message as $message) {
        echo '
        <div class="message">
            <span>' . htmlspecialchars($message) . '</span>
            <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
        </div>';
    }
}

?>

<header class="header">

    <section class="flex">
        <div class="navigation">
            <a href="dashbord.php" class="logo">Admin<span>Panel</span></a>

            <ul>
                <li class="list">
                    <a href="dashbord.php">
                        <span class="fa fa-home"></span>
                        <span class="items">Dashboard</span>
                    </a>
                </li>
                <li class="list">
                    <a href="Products.php">
                        <span class="fa fa-list"></span>
                        <span class="items">Products</span>
                    </a>
                </li>
                <li class="list">
                    <a href="customers.php">
                        <span class="fa fa-users"></span>
                        <span class="items">Customers</span>
                    </a>
                </li>
                <li class="list">
                    <a href="placed_orders.php">
                        <span class="fa fa-bag-shopping"></span>
                        <span class="items">Orders</span>
                    </a>
                </li>
                <li class="list">
                    <a href="admin_account.php">
                        <span class="fa fa-user"></span>
                        <span class="items">Admin</span>
                    </a>
                </li>
                <li class="list">
                    <a href="messages.php">
                        <span class="fa fa-message"></span>
                        <span class="items">Messages</span>
                    </a>
                </li>
            </ul>
        </div>

        <div class="head">
            <div class="icons">
                <div class="menubtn">
                    <div id="menu-btn" class="fa fa-bars"></div>
                </div>
                <div class="search">
                    <label for="search">
                        <input type="text" placeholder="Search here">
                        <div id="searchicon" class="fa fa-search"></div>
                    </label>
                </div>
                <div id="user-btn" class="fa fa-user"></div>
            </div>
        </div>

        <div class="profile">
            <?php
            // Prepare and execute the query
            $select_profile = $conn->prepare("SELECT * FROM `admin` WHERE id = ?");
            $select_profile->execute([$admin_id]);

            // Fetch the profile
            $fetch_profile = $select_profile->fetch(PDO::FETCH_ASSOC);

            // Check if the profile data is available
            if ($fetch_profile) {
                ?>
                <p><?= htmlspecialchars($fetch_profile['name']); ?></p>
                <a href="../admin/update_profile.php" class="btn">Update Profile</a>
                <div class="flex-btn">
                    <a href="../admin/admin_login.php" class="option-btn">Login</a>
                    <a href="../admin/register_admin.php" class="option-btn">Register</a>
                </div>
                <a href="../components/admin_logout.php" onclick="return confirm('Logout from this website?');" class="delete-btn">Logout</a>
                <?php
            } else {
                
                echo '<p>No profile data found. Please ensure you are logged in.</p>';
                echo '<a href="../admin/admin_login.php" class="btn">Login</a>';
            }
            ?>
        </div>
    </section>
</header>
