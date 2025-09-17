    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Hazlan Custom Template -->
    <link rel="stylesheet" href="<?= base_url('assets/HazlanTemplate/css/card.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/HazlanTemplate/css/table.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/HazlanTemplate/css/select2.css'); ?>">

    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">

    <style>
        :root {
            --primary: #6366f1;
            --primary-dark: #4338ca;
            --primary-light: #8b5cf6;
            --accent: #06b6d4;
            --accent-pink: #ec4899;
            --text-dark: #0f172a;
            --text-light: #64748b;
            --border: #e2e8f0;
            --success: #10b981;
            --error: #ef4444;
            --warning: #f59e0b;
            --surface: #ffffff;
            --glass-bg: rgba(255, 255, 255, 0.25);
            --glass-border: rgba(255, 255, 255, 0.18);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
            background: radial-gradient(circle, rgba(238, 174, 202, 1) 0%, rgba(148, 187, 233, 1) 100%);
            background-size: 400% 400%;
            animation: gradientShift 15s ease infinite;
            min-height: 100vh;
            color: var(--text-dark);
        }

        @keyframes gradientShift {

            0%,
            100% {
                background-position: 0% 50%;
            }

            50% {
                background-position: 100% 50%;
            }
        }

        /* Particles background */
        .particles {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            overflow: hidden;
            z-index: 1;
            pointer-events: none;
        }

        .particle {
            position: absolute;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            animation: float 8s infinite ease-in-out;
        }

        .particle:nth-child(odd) {
            animation-direction: reverse;
        }

        @keyframes float {

            0%,
            100% {
                transform: translateY(100vh) rotate(0deg);
                opacity: 0;
            }

            10%,
            90% {
                opacity: 1;
            }

            100% {
                transform: translateY(-100px) rotate(360deg);
            }
        }

        .particle:nth-child(1) {
            width: 8px;
            height: 8px;
            left: 10%;
            animation-delay: 0s;
            animation-duration: 6s;
        }

        .particle:nth-child(2) {
            width: 12px;
            height: 12px;
            left: 20%;
            animation-delay: 1s;
            animation-duration: 8s;
        }

        .particle:nth-child(3) {
            width: 6px;
            height: 6px;
            left: 30%;
            animation-delay: 2s;
            animation-duration: 7s;
        }

        .particle:nth-child(4) {
            width: 10px;
            height: 10px;
            left: 40%;
            animation-delay: 3s;
            animation-duration: 9s;
        }

        .particle:nth-child(5) {
            width: 14px;
            height: 14px;
            left: 50%;
            animation-delay: 4s;
            animation-duration: 6s;
        }

        .particle:nth-child(6) {
            width: 10px;
            height: 10px;
            left: 60%;
            animation-delay: 2.5s;
            animation-duration: 7s;
        }

        .particle:nth-child(7) {
            width: 8px;
            height: 8px;
            left: 70%;
            animation-delay: 4s;
            animation-duration: 9s;
        }

        .particle:nth-child(8) {
            width: 6px;
            height: 6px;
            left: 80%;
            animation-delay: 1.5s;
            animation-duration: 6s;
        }

        .particle:nth-child(9) {
            width: 12px;
            height: 12px;
            left: 90%;
            animation-delay: 3.5s;
            animation-duration: 8s;
        }

        .main-container {
            min-height: 100vh;
            padding: 20px;
        }

        .review-header {
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.9), rgba(255, 255, 255, 0.7));
            border-bottom: 1px solid var(--glass-border);
            backdrop-filter: blur(10px);
            padding: 25px 30px;
            border-radius: 20px 20px 0 0;
            box-shadow: 0 4px 20px rgba(30, 64, 175, 0.15);
        }

        .review-header h1 {
            font-size: 28px;
            font-weight: 600;
            margin-bottom: 8px;
        }

        .review-header p {
            opacity: 0.9;
            font-size: 16px;
            margin: 0;
        }

        /* Custom Nav Tabs */
        .nav-tabs {
            background: white;
            border: none;
            padding: 0 30px;
            margin: 0;
            border-bottom: 2px solid #e2e8f0;
        }

        .nav-tabs .nav-item {
            margin-bottom: -2px;
        }

        .nav-tabs .nav-link {
            background: transparent;
            border: none;
            color: #64748b;
            font-weight: 500;
            padding: 15px 20px;
            transition: all 0.3s ease;
            position: relative;
            border-radius: 0;
        }

        .nav-tabs .nav-link:hover {
            color: #1e40af;
            background: #f1f5f9;
            border: none;
        }

        .nav-tabs .nav-link.active {
            color: #1e40af;
            background: white;
            border: none;
            border-bottom: 3px solid #1e40af;
        }

        .nav-tabs .nav-link i {
            margin-right: 8px;
        }

        /* Tab Content */
        .tab-content {
            background: white;
            border-radius: 0 0 12px 12px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
            overflow: hidden;
        }

        .tab-pane {
            padding: 30px;
        }

        /* Card Styling */
        .card {
            border: none;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
            border-radius: 8px;
        }

        .card-header {
            background: #f8fafc;
            border-bottom: 2px solid #e2e8f0;
            padding: 20px;
        }

        .card-title {
            color: #1e293b;
            font-weight: 600;
            margin: 0;
            font-size: 18px;
        }

        /* Iframe Styling */
        iframe {
            border: 1px solid #e2e8f0;
            border-radius: 4px;
        }

        /* Review Form Styles */
        .paper-info-section {
            background: linear-gradient(135deg, #1e40af 0%, #1e3a8a 100%);
            color: white;
            padding: 25px;
            margin: -30px -30px 30px -30px;
            border-radius: 0;
        }

        .paper-info-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 20px;
            margin-top: 20px;
        }

        .info-field {
            background: rgba(255, 255, 255, 0.1);
            padding: 15px;
            border-radius: 8px;
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .info-field label {
            display: block;
            font-size: 12px;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 8px;
            opacity: 0.9;
            font-weight: 500;
        }

        .info-field input {
            background: rgba(255, 255, 255, 0.15);
            border: 1px solid rgba(255, 255, 255, 0.3);
            color: white;
            font-size: 14px;
            width: 100%;
            padding: 10px;
            border-radius: 6px;
        }

        .info-field input::placeholder {
            color: rgba(255, 255, 255, 0.7);
        }

        .info-field input:focus {
            outline: none;
            background: rgba(255, 255, 255, 0.2);
            border-color: rgba(255, 255, 255, 0.5);
        }

        /* Evaluation Table */
        .evaluation-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 30px;
            background: white;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        }

        .evaluation-table th {
            background: #f1f5f9;
            color: #334155;
            padding: 18px 15px;
            text-align: left;
            font-weight: 600;
            font-size: 14px;
            border-bottom: 2px solid #e2e8f0;
        }

        .evaluation-table td {
            padding: 18px 15px;
            border-bottom: 1px solid #f1f5f9;
            vertical-align: top;
        }

        .evaluation-table tr:hover {
            background: #f8fafc;
        }

        .criterion-number {
            font-weight: 600;
            color: #1e40af;
            font-size: 16px;
            width: 60px;
        }

        .criterion-text {
            font-size: 14px;
            line-height: 1.5;
            color: #475569;
            font-weight: 500;
        }

        /* Score Selector */
        .score-selector {
            display: flex;
            flex-direction: column;
            gap: 12px;
            min-width: 200px;
        }

        .score-dropdown select {
            width: 100%;
            padding: 10px 12px;
            border: 2px solid #e2e8f0;
            border-radius: 6px;
            font-family: inherit;
            font-size: 13px;
            background: white;
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .score-dropdown select:focus {
            outline: none;
            border-color: #1e40af;
            box-shadow: 0 0 0 3px rgba(30, 64, 175, 0.1);
        }

        .score-visual {
            display: flex;
            gap: 2px;
            align-items: center;
        }

        .score-bar {
            height: 6px;
            width: 18px;
            background: #e2e8f0;
            border-radius: 3px;
            transition: all 0.3s ease;
        }

        .score-bar.active.poor {
            background: #dc2626;
        }

        .score-bar.active.fair {
            background: #d97706;
        }

        .score-bar.active.good {
            background: #16a34a;
        }

        .score-bar.active.verygood {
            background: #1e40af;
        }

        .score-label {
            font-size: 11px;
            color: #64748b;
            margin-left: 8px;
            font-weight: 500;
        }

        .score-label.active {
            color: #1e293b;
            font-weight: 600;
        }

        /* Comment Box */
        .comment-box {
            width: 100%;
            min-height: 60px;
            padding: 10px;
            border: 2px solid #e2e8f0;
            border-radius: 6px;
            font-family: inherit;
            font-size: 13px;
            resize: vertical;
            transition: border-color 0.2s ease;
        }

        .comment-box:focus {
            outline: none;
            border-color: #1e40af;
            box-shadow: 0 0 0 3px rgba(30, 64, 175, 0.1);
        }

        /* Total Score Row */
        .total-score {
            background: linear-gradient(135deg, #16a34a 0%, #15803d 100%);
            color: white;
            font-weight: 700;
            font-size: 16px;
            text-align: center;
        }

        /* Additional Sections */
        .additional-section {
            background: #f8fafc;
            padding: 25px;
            border-radius: 8px;
            margin-bottom: 25px;
            border: 1px solid #e2e8f0;
        }

        .additional-section h3 {
            color: #1e293b;
            margin-bottom: 15px;
            font-weight: 600;
            font-size: 18px;
        }

        .additional-comments {
            width: 100%;
            min-height: 120px;
            padding: 15px;
            border: 2px solid #e2e8f0;
            border-radius: 8px;
            font-family: inherit;
            font-size: 14px;
            resize: vertical;
            transition: border-color 0.2s ease;
        }

        .additional-comments:focus {
            outline: none;
            border-color: #1e40af;
            box-shadow: 0 0 0 3px rgba(30, 64, 175, 0.1);
        }

        /* Form Controls */
        .form-row {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            margin-bottom: 20px;
        }

        .form-group label {
            margin-bottom: 8px;
            font-weight: 500;
            color: #1e293b;
            display: block;
        }

        .form-group select,
        .form-group input {
            padding: 12px;
            border: 2px solid #e2e8f0;
            border-radius: 6px;
            font-family: inherit;
            font-size: 14px;
            width: 100%;
            transition: border-color 0.2s ease;
        }

        .form-group select:focus,
        .form-group input:focus {
            outline: none;
            border-color: #1e40af;
            box-shadow: 0 0 0 3px rgba(30, 64, 175, 0.1);
        }

        /* Action Buttons */
        .action-buttons {
            display: flex;
            gap: 15px;
            justify-content: flex-end;
            margin-top: 30px;
        }

        .btn-custom {
            padding: 12px 24px;
            border: none;
            border-radius: 8px;
            font-family: inherit;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.2s ease;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .btn-primary-custom {
            background: linear-gradient(135deg, #1e40af 0%, #1e3a8a 100%);
            color: white;
        }

        .btn-primary-custom:hover {
            transform: translateY(-1px);
            box-shadow: 0 4px 15px rgba(30, 64, 175, 0.3);
            color: white;
        }

        .btn-secondary-custom {
            background: #64748b;
            color: white;
        }

        .btn-secondary-custom:hover {
            background: #475569;
            transform: translateY(-1px);
            color: white;
        }

        /* Timeline Styles */
        .timeline {
            position: relative;
            padding: 20px 0;
        }

        .timeline::before {
            content: '';
            position: absolute;
            left: 30px;
            top: 0;
            bottom: 0;
            width: 2px;
            background: #e2e8f0;
        }

        .time-label {
            position: relative;
            margin: 20px 0;
        }

        .time-label span {
            background: #1e40af;
            color: white;
            padding: 8px 15px;
            border-radius: 15px;
            font-size: 12px;
            font-weight: 600;
            margin-left: 60px;
        }

        .timeline-item {
            position: relative;
            margin: 15px 0 15px 70px;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        }

        .timeline-header {
            color: #1e293b;
            font-size: 16px;
            font-weight: 600;
            margin-bottom: 10px;
        }

        .timeline-body {
            color: #475569;
            line-height: 1.6;
            margin-bottom: 15px;
        }

        .timeline-footer .badge {
            padding: 6px 12px;
            border-radius: 15px;
            font-size: 11px;
            font-weight: 600;
        }

        .time {
            color: #64748b;
            font-size: 12px;
            margin-bottom: 8px;
        }

        /* Status Icons */
        .timeline i.fa-comment {
            position: absolute;
            left: 20px;
            background: #1e40af;
            color: white;
            padding: 8px;
            border-radius: 50%;
            width: 20px;
            height: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 10px;
        }

        .timeline i.fa-clock {
            position: absolute;
            left: 20px;
            background: #94a3b8;
            color: white;
            padding: 8px;
            border-radius: 50%;
            width: 20px;
            height: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 10px;
        }

        /* Validation Errors */
        .validation-error {
            color: #dc2626;
            font-size: 12px;
            margin-top: 5px;
        }

        /* Empty State */
        .empty-state {
            text-align: center;
            padding: 40px;
            color: #64748b;
        }

        .empty-state i {
            font-size: 48px;
            margin-bottom: 15px;
            opacity: 0.5;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .main-container {
                padding: 10px;
            }

            .review-header {
                padding: 20px;
            }

            .review-header h1 {
                font-size: 24px;
            }

            .tab-pane {
                padding: 20px;
            }

            .paper-info-section {
                margin: -20px -20px 20px -20px;
                padding: 20px;
            }

            .paper-info-grid {
                grid-template-columns: 1fr;
                gap: 15px;
            }

            .evaluation-table {
                font-size: 12px;
            }

            .evaluation-table th,
            .evaluation-table td {
                padding: 12px 8px;
            }

            .score-selector {
                min-width: auto;
            }

            .action-buttons {
                flex-direction: column;
            }

            .form-row {
                grid-template-columns: 1fr;
                gap: 15px;
            }

            .nav-tabs {
                padding: 0 15px;
                overflow-x: auto;
                white-space: nowrap;
            }

            .nav-tabs .nav-link {
                padding: 12px 15px;
                font-size: 14px;
            }
        }

        @media print {
            body {
                background: white;
                font-size: 12px;
            }

            .main-container {
                padding: 0;
            }

            .nav-tabs,
            .action-buttons {
                display: none;
            }

            .tab-content {
                box-shadow: none;
            }

            .paper-info-section {
                background: #f8f9fa !important;
                color: #000 !important;
            }
        }
    </style>
    <!-- Particles Background -->
    <div class="particles">
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
    </div>
    <div class="main-container">
        <div class="container-fluid">
            <!-- Header -->
            <div class="review-header">
                <h1><i class="fas fa-file-signature me-3"></i>Academic Paper Review System</h1>
                <div class="paper-info-grid">
                    <div class="info-field">
                        <label>Title of Paper Reviewed</label>
                        <input type="text" value="<?= $rpi_info->rpi_title ?>" id="paperTitle">
                    </div>
                    <!-- <div class="info-field">
                        <label>Author's Name</label>
                        <input type="text" placeholder="Enter author name..." id="authorName">
                    </div> -->
                </div>
            </div>
            <!-- Navigation Tabs -->
            <ul class="nav nav-tabs" id="reviewTabs" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="tab-turnitin" data-bs-toggle="tab" data-bs-target="#turnitin" type="button" role="tab">
                        <i class="fas fa-file-alt"></i> Turnitin Report
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="tab-fullpaper" data-bs-toggle="tab" data-bs-target="#fullpaper" type="button" role="tab">
                        <i class="fas fa-file-pdf"></i> Full Paper
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="tab-reviewform" data-bs-toggle="tab" data-bs-target="#reviewform" type="button" role="tab">
                        <i class="fas fa-clipboard-check"></i> Review Form
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="tab-history" data-bs-toggle="tab" data-bs-target="#history" type="button" role="tab">
                        <i class="fas fa-history"></i> Review History
                    </button>
                </li>
            </ul>

            <!-- Tab Content -->
            <div class="tab-content">
                <!-- Turnitin Report Tab -->
                <div class="tab-pane fade show active" id="turnitin" role="tabpanel">
                    <iframe src="<?= base_url($rpi_info->rpi_turnitin_report) . '#toolbar=0' ?>" width="100%" height="800px" style="border: none;">
                        <p>Your browser does not support iframes. Please use a modern browser to view the paper.</p>
                    </iframe>
                </div>

                <!-- Full Paper Tab -->
                <div class="tab-pane fade" id="fullpaper" role="tabpanel">
                    <iframe src="<?= base_url($rpi_info->rpi_full_paper) . '#toolbar=0' ?>" width="100%" height="800px" style="border: none;">
                        <p>Your browser does not support iframes. Please use a modern browser to view the paper.</p>
                    </iframe>
                </div>

                <!-- Review Form Tab -->
                <div class="tab-pane fade" id="reviewform" role="tabpanel">


                    <!-- Evaluation Table -->
                    <table class="evaluation-table">
                        <thead>
                            <tr>
                                <th style="width: 8%;">No.</th>
                                <th style="width: 35%;">Evaluation Criteria</th>
                                <th style="width: 32%;">Score</th>
                                <th style="width: 25%;">Comments</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="criterion-number">1</td>
                                <td class="criterion-text">Relevance and significance of the research topic</td>
                                <td>
                                    <div class="score-selector">
                                        <div class="score-dropdown">
                                            <select name="score1" onchange="updateScoreVisual(this, 1)">
                                                <option value="">Select Score...</option>
                                                <optgroup label="📉 Poor (0-3)">
                                                    <option value="0">0 - Completely inadequate</option>
                                                    <option value="1">1 - Very poor</option>
                                                    <option value="2">2 - Poor</option>
                                                    <option value="3">3 - Below expectations</option>
                                                </optgroup>
                                                <optgroup label="📊 Fair (4-6)">
                                                    <option value="4">4 - Somewhat below average</option>
                                                    <option value="5">5 - Average</option>
                                                    <option value="6">6 - Slightly above average</option>
                                                </optgroup>
                                                <optgroup label="📈 Good (7-8)">
                                                    <option value="7">7 - Good</option>
                                                    <option value="8">8 - Very good</option>
                                                </optgroup>
                                                <optgroup label="⭐ Very Good (9-10)">
                                                    <option value="9">9 - Excellent</option>
                                                    <option value="10">10 - Outstanding</option>
                                                </optgroup>
                                            </select>
                                        </div>
                                        <div class="score-visual" id="visual1">
                                            <div class="score-bar"></div>
                                            <div class="score-bar"></div>
                                            <div class="score-bar"></div>
                                            <div class="score-bar"></div>
                                            <div class="score-bar"></div>
                                            <div class="score-bar"></div>
                                            <div class="score-bar"></div>
                                            <div class="score-bar"></div>
                                            <div class="score-bar"></div>
                                            <div class="score-bar"></div>
                                            <span class="score-label" id="label3">No score selected</span>
                                        </div>
                                    </div>
                                </td>
                                <td><textarea class="comment-box" placeholder="Enter your comments..."></textarea></td>
                            </tr>
                            <tr>
                                <td class="criterion-number">4</td>
                                <td class="criterion-text">Data collection and sampling procedures</td>
                                <td>
                                    <div class="score-selector">
                                        <div class="score-dropdown">
                                            <select name="score4" onchange="updateScoreVisual(this, 4)">
                                                <option value="">Select Score...</option>
                                                <optgroup label="📉 Poor (0-3)">
                                                    <option value="0">0 - Completely inadequate</option>
                                                    <option value="1">1 - Very poor</option>
                                                    <option value="2">2 - Poor</option>
                                                    <option value="3">3 - Below expectations</option>
                                                </optgroup>
                                                <optgroup label="📊 Fair (4-6)">
                                                    <option value="4">4 - Somewhat below average</option>
                                                    <option value="5">5 - Average</option>
                                                    <option value="6">6 - Slightly above average</option>
                                                </optgroup>
                                                <optgroup label="📈 Good (7-8)">
                                                    <option value="7">7 - Good</option>
                                                    <option value="8">8 - Very good</option>
                                                </optgroup>
                                                <optgroup label="⭐ Very Good (9-10)">
                                                    <option value="9">9 - Excellent</option>
                                                    <option value="10">10 - Outstanding</option>
                                                </optgroup>
                                            </select>
                                        </div>
                                        <div class="score-visual" id="visual4">
                                            <div class="score-bar"></div>
                                            <div class="score-bar"></div>
                                            <div class="score-bar"></div>
                                            <div class="score-bar"></div>
                                            <div class="score-bar"></div>
                                            <div class="score-bar"></div>
                                            <div class="score-bar"></div>
                                            <div class="score-bar"></div>
                                            <div class="score-bar"></div>
                                            <div class="score-bar"></div>
                                            <span class="score-label" id="label4">No score selected</span>
                                        </div>
                                    </div>
                                </td>
                                <td><textarea class="comment-box" placeholder="Enter your comments..."></textarea></td>
                            </tr>
                            <tr>
                                <td class="criterion-number">5</td>
                                <td class="criterion-text">Data analysis and interpretation</td>
                                <td>
                                    <div class="score-selector">
                                        <div class="score-dropdown">
                                            <select name="score5" onchange="updateScoreVisual(this, 5)">
                                                <option value="">Select Score...</option>
                                                <optgroup label="📉 Poor (0-3)">
                                                    <option value="0">0 - Completely inadequate</option>
                                                    <option value="1">1 - Very poor</option>
                                                    <option value="2">2 - Poor</option>
                                                    <option value="3">3 - Below expectations</option>
                                                </optgroup>
                                                <optgroup label="📊 Fair (4-6)">
                                                    <option value="4">4 - Somewhat below average</option>
                                                    <option value="5">5 - Average</option>
                                                    <option value="6">6 - Slightly above average</option>
                                                </optgroup>
                                                <optgroup label="📈 Good (7-8)">
                                                    <option value="7">7 - Good</option>
                                                    <option value="8">8 - Very good</option>
                                                </optgroup>
                                                <optgroup label="⭐ Very Good (9-10)">
                                                    <option value="9">9 - Excellent</option>
                                                    <option value="10">10 - Outstanding</option>
                                                </optgroup>
                                            </select>
                                        </div>
                                        <div class="score-visual" id="visual5">
                                            <div class="score-bar"></div>
                                            <div class="score-bar"></div>
                                            <div class="score-bar"></div>
                                            <div class="score-bar"></div>
                                            <div class="score-bar"></div>
                                            <div class="score-bar"></div>
                                            <div class="score-bar"></div>
                                            <div class="score-bar"></div>
                                            <div class="score-bar"></div>
                                            <div class="score-bar"></div>
                                            <span class="score-label" id="label5">No score selected</span>
                                        </div>
                                    </div>
                                </td>
                                <td><textarea class="comment-box" placeholder="Enter your comments..."></textarea></td>
                            </tr>
                            <tr>
                                <td class="criterion-number">6</td>
                                <td class="criterion-text">Results presentation and clarity</td>
                                <td>
                                    <div class="score-selector">
                                        <div class="score-dropdown">
                                            <select name="score6" onchange="updateScoreVisual(this, 6)">
                                                <option value="">Select Score...</option>
                                                <optgroup label="📉 Poor (0-3)">
                                                    <option value="0">0 - Completely inadequate</option>
                                                    <option value="1">1 - Very poor</option>
                                                    <option value="2">2 - Poor</option>
                                                    <option value="3">3 - Below expectations</option>
                                                </optgroup>
                                                <optgroup label="📊 Fair (4-6)">
                                                    <option value="4">4 - Somewhat below average</option>
                                                    <option value="5">5 - Average</option>
                                                    <option value="6">6 - Slightly above average</option>
                                                </optgroup>
                                                <optgroup label="📈 Good (7-8)">
                                                    <option value="7">7 - Good</option>
                                                    <option value="8">8 - Very good</option>
                                                </optgroup>
                                                <optgroup label="⭐ Very Good (9-10)">
                                                    <option value="9">9 - Excellent</option>
                                                    <option value="10">10 - Outstanding</option>
                                                </optgroup>
                                            </select>
                                        </div>
                                        <div class="score-visual" id="visual6">
                                            <div class="score-bar"></div>
                                            <div class="score-bar"></div>
                                            <div class="score-bar"></div>
                                            <div class="score-bar"></div>
                                            <div class="score-bar"></div>
                                            <div class="score-bar"></div>
                                            <div class="score-bar"></div>
                                            <div class="score-bar"></div>
                                            <div class="score-bar"></div>
                                            <div class="score-bar"></div>
                                            <span class="score-label" id="label6">No score selected</span>
                                        </div>
                                    </div>
                                </td>
                                <td><textarea class="comment-box" placeholder="Enter your comments..."></textarea></td>
                            </tr>
                            <tr>
                                <td class="criterion-number">7</td>
                                <td class="criterion-text">Discussion and implications</td>
                                <td>
                                    <div class="score-selector">
                                        <div class="score-dropdown">
                                            <select name="score7" onchange="updateScoreVisual(this, 7)">
                                                <option value="">Select Score...</option>
                                                <optgroup label="📉 Poor (0-3)">
                                                    <option value="0">0 - Completely inadequate</option>
                                                    <option value="1">1 - Very poor</option>
                                                    <option value="2">2 - Poor</option>
                                                    <option value="3">3 - Below expectations</option>
                                                </optgroup>
                                                <optgroup label="📊 Fair (4-6)">
                                                    <option value="4">4 - Somewhat below average</option>
                                                    <option value="5">5 - Average</option>
                                                    <option value="6">6 - Slightly above average</option>
                                                </optgroup>
                                                <optgroup label="📈 Good (7-8)">
                                                    <option value="7">7 - Good</option>
                                                    <option value="8">8 - Very good</option>
                                                </optgroup>
                                                <optgroup label="⭐ Very Good (9-10)">
                                                    <option value="9">9 - Excellent</option>
                                                    <option value="10">10 - Outstanding</option>
                                                </optgroup>
                                            </select>
                                        </div>
                                        <div class="score-visual" id="visual7">
                                            <div class="score-bar"></div>
                                            <div class="score-bar"></div>
                                            <div class="score-bar"></div>
                                            <div class="score-bar"></div>
                                            <div class="score-bar"></div>
                                            <div class="score-bar"></div>
                                            <div class="score-bar"></div>
                                            <div class="score-bar"></div>
                                            <div class="score-bar"></div>
                                            <div class="score-bar"></div>
                                            <span class="score-label" id="label7">No score selected</span>
                                        </div>
                                    </div>
                                </td>
                                <td><textarea class="comment-box" placeholder="Enter your comments..."></textarea></td>
                            </tr>
                            <tr>
                                <td class="criterion-number">8</td>
                                <td class="criterion-text">Conclusions and recommendations</td>
                                <td>
                                    <div class="score-selector">
                                        <div class="score-dropdown">
                                            <select name="score8" onchange="updateScoreVisual(this, 8)">
                                                <option value="">Select Score...</option>
                                                <optgroup label="📉 Poor (0-3)">
                                                    <option value="0">0 - Completely inadequate</option>
                                                    <option value="1">1 - Very poor</option>
                                                    <option value="2">2 - Poor</option>
                                                    <option value="3">3 - Below expectations</option>
                                                </optgroup>
                                                <optgroup label="📊 Fair (4-6)">
                                                    <option value="4">4 - Somewhat below average</option>
                                                    <option value="5">5 - Average</option>
                                                    <option value="6">6 - Slightly above average</option>
                                                </optgroup>
                                                <optgroup label="📈 Good (7-8)">
                                                    <option value="7">7 - Good</option>
                                                    <option value="8">8 - Very good</option>
                                                </optgroup>
                                                <optgroup label="⭐ Very Good (9-10)">
                                                    <option value="9">9 - Excellent</option>
                                                    <option value="10">10 - Outstanding</option>
                                                </optgroup>
                                            </select>
                                        </div>
                                        <div class="score-visual" id="visual8">
                                            <div class="score-bar"></div>
                                            <div class="score-bar"></div>
                                            <div class="score-bar"></div>
                                            <div class="score-bar"></div>
                                            <div class="score-bar"></div>
                                            <div class="score-bar"></div>
                                            <div class="score-bar"></div>
                                            <div class="score-bar"></div>
                                            <div class="score-bar"></div>
                                            <div class="score-bar"></div>
                                            <span class="score-label" id="label8">No score selected</span>
                                        </div>
                                    </div>
                                </td>
                                <td><textarea class="comment-box" placeholder="Enter your comments..."></textarea></td>
                            </tr>
                            <tr>
                                <td class="criterion-number">9</td>
                                <td class="criterion-text">Writing quality and organization</td>
                                <td>
                                    <div class="score-selector">
                                        <div class="score-dropdown">
                                            <select name="score9" onchange="updateScoreVisual(this, 9)">
                                                <option value="">Select Score...</option>
                                                <optgroup label="📉 Poor (0-3)">
                                                    <option value="0">0 - Completely inadequate</option>
                                                    <option value="1">1 - Very poor</option>
                                                    <option value="2">2 - Poor</option>
                                                    <option value="3">3 - Below expectations</option>
                                                </optgroup>
                                                <optgroup label="📊 Fair (4-6)">
                                                    <option value="4">4 - Somewhat below average</option>
                                                    <option value="5">5 - Average</option>
                                                    <option value="6">6 - Slightly above average</option>
                                                </optgroup>
                                                <optgroup label="📈 Good (7-8)">
                                                    <option value="7">7 - Good</option>
                                                    <option value="8">8 - Very good</option>
                                                </optgroup>
                                                <optgroup label="⭐ Very Good (9-10)">
                                                    <option value="9">9 - Excellent</option>
                                                    <option value="10">10 - Outstanding</option>
                                                </optgroup>
                                            </select>
                                        </div>
                                        <div class="score-visual" id="visual9">
                                            <div class="score-bar"></div>
                                            <div class="score-bar"></div>
                                            <div class="score-bar"></div>
                                            <div class="score-bar"></div>
                                            <div class="score-bar"></div>
                                            <div class="score-bar"></div>
                                            <div class="score-bar"></div>
                                            <div class="score-bar"></div>
                                            <div class="score-bar"></div>
                                            <div class="score-bar"></div>
                                            <span class="score-label" id="label9">No score selected</span>
                                        </div>
                                    </div>
                                </td>
                                <td><textarea class="comment-box" placeholder="Enter your comments..."></textarea></td>
                            </tr>
                            <tr>
                                <td class="criterion-number">10</td>
                                <td class="criterion-text">References and citation quality</td>
                                <td>
                                    <div class="score-selector">
                                        <div class="score-dropdown">
                                            <select name="score10" onchange="updateScoreVisual(this, 10)">
                                                <option value="">Select Score...</option>
                                                <optgroup label="📉 Poor (0-3)">
                                                    <option value="0">0 - Completely inadequate</option>
                                                    <option value="1">1 - Very poor</option>
                                                    <option value="2">2 - Poor</option>
                                                    <option value="3">3 - Below expectations</option>
                                                </optgroup>
                                                <optgroup label="📊 Fair (4-6)">
                                                    <option value="4">4 - Somewhat below average</option>
                                                    <option value="5">5 - Average</option>
                                                    <option value="6">6 - Slightly above average</option>
                                                </optgroup>
                                                <optgroup label="📈 Good (7-8)">
                                                    <option value="7">7 - Good</option>
                                                    <option value="8">8 - Very good</option>
                                                </optgroup>
                                                <optgroup label="⭐ Very Good (9-10)">
                                                    <option value="9">9 - Excellent</option>
                                                    <option value="10">10 - Outstanding</option>
                                                </optgroup>
                                            </select>
                                        </div>
                                        <div class="score-visual" id="visual10">
                                            <div class="score-bar"></div>
                                            <div class="score-bar"></div>
                                            <div class="score-bar"></div>
                                            <div class="score-bar"></div>
                                            <div class="score-bar"></div>
                                            <div class="score-bar"></div>
                                            <div class="score-bar"></div>
                                            <div class="score-bar"></div>
                                            <div class="score-bar"></div>
                                            <div class="score-bar"></div>
                                            <span class="score-label" id="label10">No score selected</span>
                                        </div>
                                    </div>
                                </td>
                                <td><textarea class="comment-box" placeholder="Enter your comments..."></textarea></td>
                            </tr>
                            <tr>
                                <td colspan="3" class="total-score">Total Score</td>
                                <td class="total-score" id="totalScore">0 / 100</td>
                            </tr>
                        </tbody>
                    </table>

                    <!-- Additional Comments Section -->
                    <div class="additional-section">
                        <h3><i class="fas fa-comments me-2"></i>Additional Comments and Suggestions</h3>
                        <textarea class="additional-comments" id="additionalComments" placeholder="Please provide any additional feedback, suggestions for improvement, or general comments about the paper..."></textarea>
                    </div>

                    <!-- Decision Section -->
                    <div class="form-row">
                        <div class="form-group">
                            <label for="recommendation"><i class="fas fa-thumbs-up me-1"></i>Recommendation *</label>
                            <select id="recommendation" required>
                                <option value="">Select recommendation...</option>
                                <option value="accept">Accept</option>
                                <option value="minor_revision">Accept with Minor Revisions</option>
                                <option value="major_revision">Major Revisions Required</option>
                                <option value="reject">Reject</option>
                            </select>
                            <div class="validation-error" id="recommendationError"></div>
                        </div>
                        <div class="form-group">
                            <label for="publication"><i class="fas fa-journal-whills me-1"></i>Publication Status *</label>
                            <select id="publication" required>
                                <option value="">Select publication status...</option>
                                <option value="submit_journal">Submit to Journal</option>
                                <option value="submit_conference">Submit to Conference</option>
                                <option value="needs_improvement">Needs Improvement</option>
                                <option value="not_suitable">Not Suitable for Publication</option>
                            </select>
                            <div class="validation-error" id="publicationError"></div>
                        </div>
                    </div>

                    <!-- Reviewer Information -->
                    <div class="form-row">
                        <div class="form-group">
                            <label for="reviewerName"><i class="fas fa-user me-1"></i>Reviewer Name</label>
                            <input type="text" id="reviewerName" placeholder="Enter reviewer name...">
                        </div>
                        <div class="form-group">
                            <label for="reviewDate"><i class="fas fa-calendar me-1"></i>Review Date</label>
                            <input type="date" id="reviewDate">
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="action-buttons">
                        <button type="button" class="btn-custom btn-secondary-custom" onclick="printForm()">
                            <i class="fas fa-print"></i> Print Form
                        </button>
                        <button type="button" class="btn-custom btn-primary-custom" onclick="validateAndDraft()">
                            <i class="fas fa-paper-plane"></i> Save Draft
                        </button>
                        <button type="button" class="btn-custom btn-primary-custom" onclick="validateAndSubmit()">
                            <i class="fas fa-paper-plane"></i> Submit Review
                        </button>
                    </div>
                </div>

                <!-- Review History Tab -->
                <div class="tab-pane fade" id="history" role="tabpanel">

                    <!-- Sample Timeline Data -->
                    <div class="timeline">
                        <div class="time-label">
                            <span>15 Aug 2025</span>
                        </div>
                        <div>
                            <i class="fas fa-comment bg-info"></i>
                            <div class="timeline-item">
                                <span class="time">2:30 PM<i class="far fa-clock me-1"></i></span>
                                <h3 class="timeline-header"><strong>Dr. Ahmad Rahman</strong></h3>
                                <div class="timeline-body">
                                    The research methodology needs improvement. The sample size appears insufficient for the scope of the study. Please consider expanding your data collection or narrowing the research focus.
                                </div>
                                <div class="timeline-footer">
                                    <span class="badge bg-warning text-dark">Minor Correction</span>
                                </div>
                            </div>
                        </div>
                        <div class="time-label">
                            <span>10 Aug 2025</span>
                        </div>
                        <div>
                            <i class="fas fa-comment bg-primary"></i>
                            <div class="timeline-item">
                                <span class="time">10:15 AM<i class="far fa-clock me-1"></i></span>
                                <h3 class="timeline-header"><strong>Prof. Sarah Johnson</strong></h3>
                                <div class="timeline-body">
                                    Initial review completed. The paper shows promise but requires significant revisions in the literature review section. The theoretical framework needs stronger foundation with current research.
                                </div>
                                <div class="timeline-footer">
                                    <span class="badge bg-info">Major Revision</span>
                                </div>
                            </div>
                        </div>
                        <div><i class="far fa-clock bg-gray"></i></div>
                    </div>
                    <!-- End Timeline -->
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>

    <script>
        // Initialize date to today
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('reviewDate').valueAsDate = new Date();
        });

        // Score visualization and calculation functions
        function updateScoreVisual(selectElement, criterionNumber) {
            const score = parseInt(selectElement.value);
            const visual = document.getElementById(`visual${criterionNumber}`);
            const label = document.getElementById(`label${criterionNumber}`);
            const bars = visual.querySelectorAll('.score-bar');

            // Reset all bars
            bars.forEach(bar => {
                bar.classList.remove('active', 'poor', 'fair', 'good', 'verygood');
            });

            if (score !== '' && !isNaN(score)) {
                // Determine category
                let category = '';
                if (score >= 0 && score <= 3) {
                    category = 'poor';
                } else if (score >= 4 && score <= 6) {
                    category = 'fair';
                } else if (score >= 7 && score <= 8) {
                    category = 'good';
                } else if (score >= 9 && score <= 10) {
                    category = 'verygood';
                }

                // Activate bars up to the score
                for (let i = 0; i < score; i++) {
                    bars[i].classList.add('active', category);
                }

                // Update label
                const categoryLabels = {
                    'poor': 'Poor',
                    'fair': 'Fair',
                    'good': 'Good',
                    'verygood': 'Very Good'
                };

                label.textContent = `${score}/10 - ${categoryLabels[category]}`;
                label.classList.add('active');
            } else {
                label.textContent = 'No score selected';
                label.classList.remove('active');
            }

            calculateTotal();
        }

        function calculateTotal() {
            let total = 0;
            let count = 0;

            for (let i = 1; i <= 10; i++) {
                const select = document.querySelector(`select[name="score${i}"]`);
                if (select && select.value !== '') {
                    total += parseInt(select.value);
                    count++;
                }
            }

            document.getElementById('totalScore').textContent = `${total} / 100`;
        }

        // Form validation
        function validateForm() {
            let isValid = true;
            const recommendation = document.getElementById('recommendation');
            const publication = document.getElementById('publication');

            // Clear previous errors
            document.getElementById('recommendationError').textContent = '';
            document.getElementById('publicationError').textContent = '';

            if (!recommendation.value) {
                document.getElementById('recommendationError').textContent = 'Please select a recommendation';
                isValid = false;
            }

            if (!publication.value) {
                document.getElementById('publicationError').textContent = 'Please select a publication status';
                isValid = false;
            }

            return isValid;
        }

        // Submit function
        function validateAndSubmit() {
            if (validateForm()) {
                // Check if at least some scores are provided
                const scoredItems = document.querySelectorAll('select[name^="score"]');
                let hasScores = false;

                scoredItems.forEach(select => {
                    if (select.value !== '') {
                        hasScores = true;
                    }
                });

                if (!hasScores) {
                    alert('Please provide at least one score before submitting.');
                    return;
                }

                // Success message
                alert('Review submitted successfully!\n\nIn a real application, this data would be sent to your CodeIgniter 4 backend.');

                // Log form data for debugging
                console.log('Form data that would be sent to CI4:', gatherFormData());
            }
        }

        // Gather all form data
        function gatherFormData() {
            const data = {
                paperTitle: document.getElementById('paperTitle').value,
                authorName: document.getElementById('authorName').value,
                scores: {},
                comments: [],
                additionalComments: document.getElementById('additionalComments').value,
                recommendation: document.getElementById('recommendation').value,
                publication: document.getElementById('publication').value,
                reviewerName: document.getElementById('reviewerName').value,
                reviewDate: document.getElementById('reviewDate').value
            };

            // Collect scores and comments
            for (let i = 1; i <= 10; i++) {
                const select = document.querySelector(`select[name="score${i}"]`);
                if (select && select.value !== '') {
                    data.scores[`criterion${i}`] = parseInt(select.value);
                }

                const comment = document.querySelectorAll('.comment-box')[i - 1];
                if (comment && comment.value.trim()) {
                    data.comments.push({
                        criterion: i,
                        comment: comment.value.trim()
                    });
                }
            }

            return data;
        }

        // Print function
        function printForm() {
            window.print();
        }

        // Add smooth transitions for tab switching
        document.addEventListener('DOMContentLoaded', function() {
            const tabs = document.querySelectorAll('[data-bs-toggle="tab"]');
            tabs.forEach(tab => {
                tab.addEventListener('shown.bs.tab', function(e) {
                    // Add any additional functionality when tab is shown
                    console.log('Tab switched to:', e.target.getAttribute('data-bs-target'));
                });
            });
        });
    </script>