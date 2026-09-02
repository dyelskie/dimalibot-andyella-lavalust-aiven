<?php defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Management Module</title>
    <style>
        :root {
            --bg-1: #07070b;
            --bg-2: #100a18;
            --panel: rgba(18, 12, 27, 0.82);
            --panel-strong: rgba(24, 17, 35, 0.96);
            --panel-soft: rgba(32, 22, 46, 0.88);
            --line: rgba(168, 85, 247, 0.28);
            --line-strong: rgba(168, 85, 247, 0.55);
            --text: #f5f3ff;
            --muted: #b6a8d6;
            --purple: #a855f7;
            --purple-2: #8b5cf6;
            --purple-3: #d8b4fe;
            --cyan: #67e8f9;
            --glow: rgba(168, 85, 247, 0.45);
        }

        * { box-sizing: border-box; }

        body {
            min-height: 100vh;
            margin: 0;
            padding: 52px 22px;
            color: var(--text);
            font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
            background:
                radial-gradient(circle at top left, rgba(168, 85, 247, 0.22), transparent 26%),
                radial-gradient(circle at bottom right, rgba(103, 232, 249, 0.10), transparent 28%),
                linear-gradient(135deg, var(--bg-1) 0%, var(--bg-2) 45%, #090910 100%);
        }

        body::before {
            content: "";
            position: fixed;
            inset: 0;
            background-image:
                linear-gradient(rgba(255,255,255,0.02) 1px, transparent 1px),
                linear-gradient(90deg, rgba(255,255,255,0.02) 1px, transparent 1px);
            background-size: 30px 30px;
            mask-image: radial-gradient(circle at center, black 55%, transparent 100%);
            pointer-events: none;
        }

        main {
            width: min(1100px, 100%);
            margin: 0 auto;
            position: relative;
            z-index: 1;
        }

        .dashboard-shell {
            padding: 22px;
            border: 1px solid var(--line);
            border-radius: 24px;
            background: rgba(12, 9, 20, 0.72);
            box-shadow: 0 0 0 1px rgba(168, 85, 247, 0.1), 0 25px 80px rgba(12, 8, 24, 0.8), 0 0 50px rgba(168, 85, 247, 0.18);
            backdrop-filter: blur(10px);
        }

        .topbar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 16px;
            padding-bottom: 18px;
            margin-bottom: 20px;
            border-bottom: 1px solid var(--line);
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .brand-mark {
            width: 12px;
            height: 12px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--purple-3), var(--purple));
            box-shadow: 0 0 18px var(--glow);
        }

        .eyebrow {
            margin: 0;
            color: var(--purple-3);
            font-size: 0.75rem;
            font-weight: 700;
            letter-spacing: 0.18em;
            text-transform: uppercase;
        }

        .status-pill {
            padding: 8px 12px;
            border: 1px solid var(--line-strong);
            border-radius: 999px;
            background: rgba(168, 85, 247, 0.08);
            color: var(--purple-3);
            font-size: 0.72rem;
            letter-spacing: 0.12em;
            text-transform: uppercase;
        }

        .heading {
            display: flex;
            align-items: end;
            justify-content: space-between;
            gap: 24px;
            margin: 18px 0 26px;
        }

        h1 {
            margin: 0;
            font-size: clamp(2.5rem, 5vw, 4.5rem);
            letter-spacing: -0.06em;
            line-height: 0.92;
            color: var(--text);
            text-shadow: 0 0 25px rgba(168, 85, 247, 0.35);
        }

        .heading p {
            max-width: 320px;
            margin: 0;
            color: var(--muted);
            line-height: 1.6;
            font-size: 0.95rem;
            text-align: right;
        }

        .stats-row {
            display: grid;
            grid-template-columns: repeat(3, minmax(160px, 1fr));
            gap: 16px;
            margin-bottom: 24px;
        }

        .stat {
            padding: 18px 18px 16px;
            border: 1px solid var(--line);
            border-radius: 18px;
            background: linear-gradient(180deg, rgba(27, 18, 38, 0.98), rgba(17, 12, 24, 0.8));
            box-shadow: inset 0 0 0 1px rgba(255,255,255,0.02);
        }

        .stat-label {
            color: var(--muted);
            font-size: 0.7rem;
            letter-spacing: 0.14em;
            text-transform: uppercase;
        }

        .stat-value {
            margin-top: 10px;
            font-size: clamp(1.5rem, 2vw, 2.3rem);
            font-weight: 700;
            color: var(--text);
        }

        .table-panel {
            overflow: hidden;
            border: 1px solid var(--line);
            border-radius: 18px;
            background: rgba(16, 12, 23, 0.86);
            box-shadow: inset 0 0 0 1px rgba(168, 85, 247, 0.08), 0 15px 40px rgba(14, 10, 17, 0.8);
        }

        .panel-bar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 16px;
            padding: 18px 20px;
            border-bottom: 1px solid var(--line);
            background: linear-gradient(180deg, rgba(26, 18, 38, 0.95), rgba(16, 12, 23, 0.9));
        }

        .panel-title {
            margin: 0;
            font-size: 0.74rem;
            letter-spacing: 0.18em;
            text-transform: uppercase;
            color: var(--purple-3);
        }

        .count {
            color: var(--cyan);
            font-size: 0.8rem;
            font-weight: 700;
            letter-spacing: 0.08em;
            text-transform: uppercase;
        }

        .table-scroll { overflow-x: auto; }

        table {
            width: 100%;
            min-width: 760px;
            border-collapse: collapse;
        }

        th, td {
            padding: 18px 20px;
            text-align: left;
            border-bottom: 1px solid var(--line);
        }

        th {
            color: var(--muted);
            background: rgba(10, 8, 16, 0.8);
            font-size: 0.7rem;
            letter-spacing: 0.14em;
            text-transform: uppercase;
        }

        td {
            color: #f0e9ff;
            font-size: 0.96rem;
        }

        tbody tr {
            transition: background-color 0.2s ease, transform 0.2s ease;
        }

        tbody tr:hover {
            background: rgba(168, 85, 247, 0.08);
        }

        tbody tr:last-child td { border-bottom: 0; }

        td:first-child {
            color: var(--purple-3);
            font-weight: 700;
        }

        td:nth-child(4) { color: var(--cyan); }

        .empty {
            color: var(--muted);
            text-align: center;
            padding: 30px 20px;
        }

        @media (max-width: 640px) {
            body { padding: 28px 14px; }
            .dashboard-shell { padding: 14px; }
            .topbar, .heading { flex-direction: column; align-items: flex-start; }
            .heading p { text-align: left; }
            .stats-row { grid-template-columns: 1fr; }
            .panel-bar { padding: 14px; }
            th, td { padding: 14px 12px; }
        }
    </style>
</head>
<body>
    <main>
        <div class="dashboard-shell">
            <div class="topbar">
                <div class="brand">
                    <span class="brand-mark"></span>
                    <p class="eyebrow">LavaLust / Directory</p>
                </div>
                <span class="status-pill">System online</span>
            </div>

            <div class="heading">
                <h1>Users</h1>
                <p>Active records from the application database.</p>
            </div>

            <div class="stats-row">
                <div class="stat">
                    <div class="stat-label">Total Users</div>
                    <div class="stat-value"><?= count($users ?? []) ?></div>
                </div>
                <div class="stat">
                    <div class="stat-label">Status</div>
                    <div class="stat-value">Active</div>
                </div>
                <div class="stat">
                    <div class="stat-label">Mode</div>
                    <div class="stat-value">Live</div>
                </div>
            </div>

            <section class="table-panel">
                <div class="panel-bar">
                    <h2 class="panel-title">User Registry</h2>
                    <span class="count"><?= count($users ?? []) ?> records</span>
                </div>
                <div class="table-scroll">
                    <table>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Email</th>
                                <th>Username</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($users)): ?>
                                <?php foreach ($users as $user): ?>
                                    <tr>
                                        <td><?= htmlspecialchars($user['id'], ENT_QUOTES, 'UTF-8') ?></td>
                                        <td><?= htmlspecialchars($user['firstname'], ENT_QUOTES, 'UTF-8') ?></td>
                                        <td><?= htmlspecialchars($user['lastname'], ENT_QUOTES, 'UTF-8') ?></td>
                                        <td><?= htmlspecialchars($user['email'], ENT_QUOTES, 'UTF-8') ?></td>
                                        <td><?= htmlspecialchars($user['username'], ENT_QUOTES, 'UTF-8') ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td class="empty" colspan="5">No users found.</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </section>
        </div>
    </main>
</body>
</html>