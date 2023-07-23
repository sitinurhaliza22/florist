<nav class="pt-3">
    <div style="display: flex;justify-content: space-between;padding: 5px 30px;">
        <div>
            <p style="position: relative;top: 3px;">Ailee's Florist</p>
        </div>
        <div>
            <ul>
                <li><a href="index.php"><i class="fas fa-home"></i></a></li>
                <li><a href="keranjang.php"><i class="fas fa-shopping-cart"></i></a></li>
                <li><a href="pesanan.php"><i class="fas fa-receipt"></i></a></li>

                <?php if (isset($_SESSION['username'])) : ?>
                <li><a href="logout.php" class="btn" style="border-bottom: none;">Logout</a></li>
                <?php else: ?>
                <li><a href="login.php" class="btn" style="border-bottom: none;">Login</a></li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
    
</nav>