<?php
/**
 * SHOPNTQ - Setup Sample Accounts
 * 
 * This script creates sample user and admin accounts for Phase 1 MVP
 * Usage: Access via browser at /setup-accounts.php
 * 
 * Sample Accounts:
 * - Customer: user1@shop.local / password: user1
 * - Admin: admin1@shop.local / password: admin1
 */

$host = '127.0.0.1';
$db   = 'shopntq';
$user = 'root';
$pass = '';

$dsn = "mysql:host=$host;dbname=$db;charset=utf8mb4";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
    echo "<h1>✅ Database Connected</h1>";
    
    // Sample accounts to create
    $accounts = [
        [
            'email' => 'user1@shop.local',
            'password' => 'user1',
            'first_name' => 'Sample',
            'last_name' => 'User',
            'role' => 'customer'
        ],
        [
            'email' => 'admin1@shop.local',
            'password' => 'admin1',
            'first_name' => 'Admin',
            'last_name' => 'User',
            'role' => 'admin'
        ]
    ];
    
    echo "<h2>Setting up sample accounts...</h2>";
    echo "<table border='1' cellpadding='10'>";
    echo "<tr><th>Email</th><th>Role</th><th>Password</th><th>Status</th></tr>";
    
    foreach ($accounts as $account) {
        $email = $account['email'];
        $password_hash = password_hash($account['password'], PASSWORD_BCRYPT);
        
        try {
            // Check if account exists
            $stmt = $pdo->prepare("SELECT id FROM users WHERE email = ?");
            $stmt->execute([$email]);
            $existing = $stmt->fetch();
            
            if ($existing) {
                // Update existing
                $stmt = $pdo->prepare("
                    UPDATE users 
                    SET password_hash = ?, role = ?, first_name = ?, last_name = ?
                    WHERE email = ?
                ");
                $stmt->execute([
                    $password_hash,
                    $account['role'],
                    $account['first_name'],
                    $account['last_name'],
                    $email
                ]);
                $status = "✅ Updated";
            } else {
                // Create new
                $stmt = $pdo->prepare("
                    INSERT INTO users (email, password_hash, first_name, last_name, role, created_at)
                    VALUES (?, ?, ?, ?, ?, NOW())
                ");
                $stmt->execute([
                    $email,
                    $password_hash,
                    $account['first_name'],
                    $account['last_name'],
                    $account['role']
                ]);
                $status = "✅ Created";
            }
        } catch (\Exception $e) {
            $status = "❌ Error: " . $e->getMessage();
        }
        
        echo "<tr>";
        echo "<td>{$email}</td>";
        echo "<td>{$account['role']}</td>";
        echo "<td><code>{$account['password']}</code></td>";
        echo "<td>{$status}</td>";
        echo "</tr>";
    }
    
    echo "</table>";
    
    // Verify hash works
    echo "<h2>Testing Password Verification...</h2>";
    $stmt = $pdo->prepare("SELECT id, email, password_hash, role FROM users WHERE email IN ('user1@shop.local', 'admin1@shop.local')");
    $stmt->execute();
    $users = $stmt->fetchAll();
    
    echo "<table border='1' cellpadding='10'>";
    echo "<tr><th>Email</th><th>Role</th><th>Test Password</th><th>Verify Result</th></tr>";
    
    $test_passwords = [
        'user1@shop.local' => 'user1',
        'admin1@shop.local' => 'admin1'
    ];
    
    foreach ($users as $user) {
        $email = $user['email'];
        $test_pwd = $test_passwords[$email];
        $is_valid = password_verify($test_pwd, $user['password_hash']) ? '✅ Valid' : '❌ Invalid';
        
        echo "<tr>";
        echo "<td>{$email}</td>";
        echo "<td>{$user['role']}</td>";
        echo "<td><code>{$test_pwd}</code></td>";
        echo "<td>{$is_valid}</td>";
        echo "</tr>";
    }
    
    echo "</table>";
    
    echo "<hr>";
    echo "<h2>✨ Sample Data Setup Complete!</h2>";
    echo "<p><strong>Sample Accounts Created:</strong></p>";
    echo "<ul>";
    echo "<li><strong>Customer Account:</strong> user1@shop.local / user1</li>";
    echo "<li><strong>Admin Account:</strong> admin1@shop.local / admin1</li>";
    echo "</ul>";
    echo "<p>You can now proceed with Phase 1 development. Use these accounts for testing.</p>";
    
} catch (\PDOException $e) {
    echo "<h1>❌ Connection Failed</h1>";
    echo "<p>Error: " . $e->getMessage() . "</p>";
    echo "<p>Make sure:</p>";
    echo "<ul>";
    echo "<li>XAMPP MySQL is running</li>";
    echo "<li>Database 'shopntq' is created</li>";
    echo "<li>shopntq.sql has been imported</li>";
    echo "</ul>";
}
?>
