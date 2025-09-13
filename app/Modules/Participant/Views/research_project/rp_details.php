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
    
    <!-- Modern Glassmorphism Styles -->
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
            /* background: linear-gradient(135deg, #667eea 0%, #764ba2 25%, #f093fb 50%, #f5576c 75%, #4facfe 100%); */
            background: radial-gradient(circle, rgba(238,174,202,1) 0%, rgba(148,187,233,1) 100%);
            background-size: 400% 400%;
            animation: gradientShift 15s ease infinite;
            min-height: 100vh;
            color: var(--text-dark);
        }

        @keyframes gradientShift {
            0%, 100% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
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

        .particle:nth-child(odd) { animation-direction: reverse; }

        @keyframes float {
            0%, 100% { transform: translateY(100vh) rotate(0deg); opacity: 0; }
            10%, 90% { opacity: 1; }
            100% { transform: translateY(-100px) rotate(360deg); }
        }

        .particle:nth-child(1) { width: 8px; height: 8px; left: 10%; animation-delay: 0s; animation-duration: 6s; }
        .particle:nth-child(2) { width: 12px; height: 12px; left: 20%; animation-delay: 1s; animation-duration: 8s; }
        .particle:nth-child(3) { width: 6px; height: 6px; left: 30%; animation-delay: 2s; animation-duration: 7s; }
        .particle:nth-child(4) { width: 10px; height: 10px; left: 40%; animation-delay: 3s; animation-duration: 9s; }
        .particle:nth-child(5) { width: 14px; height: 14px; left: 50%; animation-delay: 4s; animation-duration: 6s; }
        .particle:nth-child(6) { width: 10px; height: 10px; left: 60%; animation-delay: 2.5s; animation-duration: 7s; }
        .particle:nth-child(7) { width: 8px; height: 8px; left: 70%; animation-delay: 4s; animation-duration: 9s; }
        .particle:nth-child(8) { width: 6px; height: 6px; left: 80%; animation-delay: 1.5s; animation-duration: 6s; }
        .particle:nth-child(9) { width: 12px; height: 12px; left: 90%; animation-delay: 3.5s; animation-duration: 8s; }

        .content {
            padding: 30px;
            position: relative;
            z-index: 10;
            min-height: 100vh;
        }

        /* Content Card Styles */
        .content-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            border-radius: 20px;
            border: 1px solid var(--glass-border);
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
            overflow: hidden;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
        }

        .content-card::before {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(45deg, rgba(99, 102, 241, 0.05), rgba(139, 92, 246, 0.05));
            z-index: -1;
        }

        .content-card:hover {
            /* transform: translateY(-5px); */
            box-shadow: 0 35px 60px -12px rgba(0, 0, 0, 0.3);
        }

        .card-header {
            padding: 25px 30px;
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.9), rgba(255, 255, 255, 0.7));
            border-bottom: 1px solid var(--glass-border);
            backdrop-filter: blur(10px);
            display: flex;
            justify-content: between;
            align-items: center;
        }

        .card-header h5 {
            margin: 0;
            font-weight: 700;
            font-size: 1.4rem;
            color: var(--text-dark);
            display: flex;
            align-items: center;
            /* background: linear-gradient(135deg, var(--primary), var(--accent-pink)); */
            /* -webkit-background-clip: text;
            -webkit-text-fill-color: transparent; */
            background-clip: text;
        }

        .card-header h5 i {
            margin-right: 12px;
            color: var(--primary);
            font-size: 1.3rem;
            -webkit-text-fill-color: var(--primary);
        }

        .card-body {
            padding: 30px;
        }

        /* Table Styles */
        /* .table-responsive {
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
        } */

        /* Alert Styles */
        .glass-alert {
            background: rgba(255, 193, 7, 0.1);
            backdrop-filter: blur(15px);
            border: 1px solid rgba(255, 193, 7, 0.3);
            border-left: 4px solid var(--warning);
            border-radius: 15px;
            padding: 25px;
            margin-bottom: 25px;
            animation: pulse 2s infinite;
        }

        .glass-alert .alert-icon {
            font-size: 2rem;
            color: var(--warning);
            margin-right: 15px;
        }

        .glass-alert strong {
            color: var(--warning);
            font-weight: 700;
        }

        .glass-alert ul {
            margin-top: 10px;
            margin-bottom: 0;
        }
        
        /* Badge Styles */
        .badge {
            padding: 8px 16px;
            border-radius: 12px;
            font-weight: 600;
            font-size: 0.8rem;
            letter-spacing: 0.3px;
        }

        .bg-secondary {
            background: linear-gradient(135deg, #6c757d, #5a6268) !important;
        }

        .bg-info {
            background: linear-gradient(135deg, var(--accent), #0891b2) !important;
        }

        /* Button Styles */
        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 10px 16px;
            border-radius: 12px;
            font-weight: 600;
            font-size: 0.85rem;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            cursor: pointer;
            border: none;
            text-decoration: none;
            position: relative;
            overflow: hidden;
        }

        .btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
            transition: left 0.5s;
        }

        .btn:hover::before {
            left: 100%;
        }

        .btn-sm {
            padding: 8px 12px;
            font-size: 0.75rem;
        }

        .btn-outline-primary {
            background: var(--glass-bg);
            backdrop-filter: blur(10px);
            color: var(--primary);
            border: 2px solid var(--primary);
            box-shadow: 0 4px 15px rgba(99, 102, 241, 0.2);
        }

        .btn-outline-primary:hover {
            background: var(--primary);
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(99, 102, 241, 0.4);
        }

        .btn-outline-warning {
            background: var(--glass-bg);
            backdrop-filter: blur(10px);
            color: var(--warning);
            border: 2px solid var(--warning);
            box-shadow: 0 4px 15px rgba(99, 102, 241, 0.2);
        }

        .btn-outline-warning:hover {
            background: var(--warning);
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(99, 102, 241, 0.4);
        }

        .btn-outline-danger {
            background: var(--glass-bg);
            backdrop-filter: blur(10px);
            color: var(--error);
            border: 2px solid var(--error);
            box-shadow: 0 4px 15px rgba(239, 68, 68, 0.2);
        }

        .btn-outline-danger:hover {
            background: var(--error);
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(239, 68, 68, 0.4);
        }

        .btn-secondary {
            background: linear-gradient(135deg, #6c757d, #5a6268);
            color: white;
            box-shadow: 0 8px 20px rgba(108, 117, 125, 0.3);
        }

        .btn-secondary:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 30px rgba(108, 117, 125, 0.4);
        }

        .btn-corporate-primary {
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            color: white;
            box-shadow: 0 8px 20px rgba(99, 102, 241, 0.3);
        }

        .btn-corporate-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 30px rgba(99, 102, 241, 0.4);
        }

        .action-buttons {
            display: flex;
            gap: 8px;
            justify-content: center;
        }

        /* Enhanced Modal Styles - Add these to your existing CSS */

/* Modal Backdrop */
.modal-backdrop {
    backdrop-filter: blur(10px);
    background-color: rgba(0, 0, 0, 0.6);
}

/* Modal Content */
.modal-content {
    background: rgba(255, 255, 255, 0.95);
    backdrop-filter: blur(20px);
    border: 1px solid rgba(255, 255, 255, 0.18);
    border-radius: 25px;
    box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.4);
    overflow: hidden;
}

/* Modal Header */
.modal-header {
    background: linear-gradient(135deg, var(--primary, #6366f1), var(--primary-dark, #4338ca));
    color: white;
    border-bottom: none;
    border-radius: 25px 25px 0 0;
    padding: 25px 35px;
    position: relative;
    overflow: hidden;
}

.modal-header::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255,255,255,0.1), transparent);
    animation: shimmer 3s infinite;
}

@keyframes shimmer {
    0% { left: -100%; }
    50% { left: 100%; }
    100% { left: 100%; }
}

.modal-title {
    font-weight: 700;
    font-size: 1.3rem;
    margin: 0;
    display: flex;
    align-items: center;
}

.modal-title i {
    margin-right: 12px;
    font-size: 1.2rem;
}

.btn-close {
    background: rgba(255, 255, 255, 0.2);
    border-radius: 50%;
    width: 35px;
    height: 35px;
    opacity: 1;
    transition: all 0.3s ease;
    filter: invert(1);
}

.btn-close:hover {
    background: rgba(255, 255, 255, 0.3);
    transform: scale(1.1);
}

/* Modal Body */
.modal-body {
    padding: 35px;
    background: transparent;
}

/* Form Labels */
.modal-body .form-label {
    font-weight: 600;
    color: var(--text-dark, #0f172a);
    margin-bottom: 10px;
    font-size: 0.95rem;
    display: flex;
    align-items: center;
}

.modal-body .form-label i {
    margin-right: 8px;
    color: var(--primary, #6366f1);
    font-size: 1rem;
}

/* Form Controls */
.modal-body .form-control {
    background: rgba(255, 255, 255, 0.8);
    backdrop-filter: blur(10px);
    border: 1px solid rgba(255, 255, 255, 0.3);
    border-radius: 12px;
    padding: 12px 16px;
    font-size: 0.9rem;
    color: var(--text-dark, #0f172a);
    transition: all 0.3s ease;
}

.modal-body .form-control:focus {
    border-color: var(--primary, #6366f1);
    box-shadow: 0 0 0 0.25rem rgba(99, 102, 241, 0.15);
    background: rgba(255, 255, 255, 0.95);
    transform: translateY(-1px);
}

/* Enhanced File Upload Styling */
.btn-upload {
    background: rgba(255, 255, 255, 0.8);
    backdrop-filter: blur(15px);
    border: 2px dashed rgba(99, 102, 241, 0.3);
    border-radius: 15px;
    padding: 25px;
    text-align: center;
    cursor: pointer;
    transition: all 0.3s ease;
    display: block;
    width: 100%;
    position: relative;
    overflow: hidden;
}

.btn-upload::before {
    content: '\f0ee'; /* FontAwesome cloud-upload icon */
    font-family: 'Font Awesome 6 Free';
    font-weight: 900;
    font-size: 2rem;
    color: var(--primary, #6366f1);
    display: block;
    margin-bottom: 10px;
    transition: all 0.3s ease;
}

.btn-upload::after {
    content: 'Click to upload file';
    display: block;
    color: var(--text-light, #64748b);
    font-size: 0.9rem;
    font-weight: 500;
}

.btn-upload:hover {
    border-color: var(--primary, #6366f1);
    background: rgba(255, 255, 255, 0.9);
    transform: translateY(-2px);
    box-shadow: 0 10px 25px rgba(99, 102, 241, 0.15);
}

.btn-upload:hover::before {
    transform: scale(1.1);
    color: var(--primary-dark, #4338ca);
}

.btn-upload input[type="file"] {
    position: absolute;
    opacity: 0;
    width: 100%;
    height: 100%;
    cursor: pointer;
    top: 0;
    left: 0;
}

/* File Upload States */
.btn-upload.file-selected {
    border-color: var(--success, #10b981);
    background: rgba(16, 185, 129, 0.1);
}

.btn-upload.file-selected::before {
    content: '\f00c'; /* FontAwesome check icon */
    color: var(--success, #10b981);
}

.btn-upload.file-selected::after {
    content: 'File selected successfully';
    color: var(--success, #10b981);
}

/* Bank Details Enhanced */
.bank-details {
    background: linear-gradient(135deg, rgba(6, 182, 212, 0.1), rgba(99, 102, 241, 0.1));
    backdrop-filter: blur(15px);
    border: 1px solid rgba(255, 255, 255, 0.3);
    border-left: 4px solid var(--accent, #06b6d4);
    border-radius: 15px;
    padding: 25px;
    margin-bottom: 25px;
    position: relative;
    overflow: hidden;
}

.bank-details::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 2px;
    background: linear-gradient(90deg, var(--accent, #06b6d4), var(--primary, #6366f1));
    opacity: 0.7;
}

.bank-details h5 {
    color: var(--accent, #06b6d4);
    font-weight: 700;
    margin-bottom: 20px;
    display: flex;
    align-items: center;
}

.bank-details h5 i {
    margin-right: 10px;
    font-size: 1.3rem;
}

.bank-details p {
    margin-bottom: 8px;
    color: var(--text-dark, #0f172a);
    font-size: 0.9rem;
}

.bank-details strong {
    color: var(--text-dark, #0f172a);
    font-weight: 600;
}

/* Modal Footer */
.modal-footer {
    border-top: 1px solid rgba(255, 255, 255, 0.3);
    padding: 25px 35px;
    background: rgba(248, 249, 250, 0.5);
    border-radius: 0 0 25px 25px;
    display: flex;
    gap: 15px;
    justify-content: flex-end;
}

/* Enhanced Button Styles */
.modal-footer .btn {
    padding: 12px 25px;
    border-radius: 12px;
    font-weight: 600;
    font-size: 0.9rem;
    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    position: relative;
    overflow: hidden;
    display: flex;
    align-items: center;
    border: none;
}

.modal-footer .btn i {
    margin-right: 8px;
    font-size: 0.9rem;
}

.modal-footer .btn::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
    transition: left 0.5s;
}

.modal-footer .btn:hover::before {
    left: 100%;
}

.modal-footer .btn:hover {
    transform: translateY(-2px);
}

/* Secondary Button */
.modal-footer .btn-secondary {
    background: linear-gradient(135deg, #6c757d, #5a6268);
    color: white;
    box-shadow: 0 5px 15px rgba(108, 117, 125, 0.3);
}

.modal-footer .btn-secondary:hover {
    box-shadow: 0 8px 25px rgba(108, 117, 125, 0.4);
    color: white;
}

/* Warning Button */
.modal-footer .btn-warning {
    background: linear-gradient(135deg, #f59e0b, #d97706);
    color: white;
    box-shadow: 0 5px 15px rgba(245, 158, 11, 0.3);
}

.modal-footer .btn-warning:hover {
    box-shadow: 0 8px 25px rgba(245, 158, 11, 0.4);
    color: white;
}

/* Primary Button */
.modal-footer .btn-primary {
    background: linear-gradient(135deg, var(--primary, #6366f1), var(--primary-dark, #4338ca));
    color: white;
    box-shadow: 0 5px 15px rgba(99, 102, 241, 0.3);
}

.modal-footer .btn-primary:hover {
    box-shadow: 0 8px 25px rgba(99, 102, 241, 0.4);
    color: white;
}

/* Responsive Design for Modal */
@media (max-width: 768px) {
    .modal-dialog {
        margin: 20px;
    }
    
    .modal-header,
    .modal-body,
    .modal-footer {
        padding: 20px;
    }
    
    .modal-title {
        font-size: 1.1rem;
    }
    
    .btn-upload {
        padding: 20px;
    }
    
    .btn-upload::before {
        font-size: 1.5rem;
    }
    
    .modal-footer {
        flex-direction: column;
        gap: 10px;
    }
    
    .modal-footer .btn {
        width: 100%;
        justify-content: center;
    }
}

        /* Animation classes */
        .animate-in {
            animation: slideInUp 0.6s ease-out;
        }

        @keyframes slideInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .content {
                padding: 20px 15px;
            }

            .card-header,
            .card-body {
                padding: 20px;
            }

            .table-custom thead th,
            .table-custom tbody td {
                padding: 12px 8px;
                font-size: 0.85rem;
            }

            .action-buttons {
                flex-direction: column;
                gap: 6px;
            }

            .particles { display: none; }
        }

        @media (max-width: 480px) {
            .content {
                padding: 15px 10px;
            }

            .card-header,
            .card-body {
                padding: 15px;
            }

            .card-header h5 {
                font-size: 1.2rem;
            }
        }

        .file-name {
    display: block;
    margin-top: 5px;
    font-size: 0.9em;
    color: #6c757d;
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


    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="content-card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">
                                <i class="fas fa-calendar-check"></i>
                                Project Details
                            </h5>
                            <!-- Project Status (Now in Badge) -->
                            <?php
                            $status_classes = [
                                'approved' => 'bg-success text-white',
                                'Draft' => 'bg-warning text-dark',
                                'Full Report Draft' => 'bg-info text-white',
                                'Minor Correction' => 'bg-primary text-white',
                                'Major Correction' => 'bg-danger text-white',
                                'rejected' => 'bg-danger text-white',
                                'pending' => 'bg-secondary text-white'
                            ];
                            $status_class = isset($status_classes[$rpi_info->rpi_status]) ? $status_classes[$rpi_info->rpi_status] : 'bg-secondary text-white';
                            ?>
                            <div class="status-badge <?= $status_class ?> m-0  ms-auto">
                                <i class="fas fa-circle me-1"></i> Status: <?= ucfirst($rpi_info->rpi_status) ?>
                            </div>
                        </div>
                        <!-- <form> -->
                        <div class="card-body">
                            <div class="row g-4">
                                <!-- Left Section -->
                                 <div class="col-lg-6 border-end border-light">
                                    <h6 class="section-title">Basic Information</h6>

                                    <div class="mb-4">
                                        <label class="form-label">
                                            Research / Project Title
                                        </label>
                                        <input type="text" class="form-control bg-light" id="rpi_title" name="rpi_title" value="<?= $rpi_info->rpi_title ?>" readonly>
                                    </div>

                                    <div class="mb-4">
                                        <label class="form-label">
                                            Project Field
                                        </label>
                                        <input type="text" class="form-control bg-light" id="rpi_rf_id" name="rpi_rf_id" value="<?= get_field_desc($rpi_info->rpi_rf_id) ?>" readonly>
                                    </div>

                                    <h6 class="section-title mt-5">Project Documents</h6>

                                    <div class="row g-3 mb-4">
                                        <div class="col-md-6">
                                            <label class="form-label">
                                                Abstract
                                            </label>
                                            <?php if (!empty($rpi_info->rpi_abstract)): ?>
                                                <div class="document-container">
                                                    <a href="<?= base_url($rpi_info->rpi_abstract) ?>" target="_blank" class="btn btn-outline-primary w-100 document-link">
                                                        <i class="fas fa-file-pdf"></i>
                                                        <span>View Abstract</span>
                                                        <i class="fas fa-external-link-alt ms-auto"></i>
                                                    </a>
                                                </div>
                                            <?php else: ?>
                                                <div class="no-document-alert">
                                                    <i class="fas fa-file-alt"></i>
                                                    <p>No abstract uploaded</p>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                        
                                        <?php if ($rpi_info->rpi_full_paper): ?>
                                            <div class="col-md-6">
                                                <label class="form-label">
                                                    Payment Proof
                                                </label>
                                                <?php if (!empty($rpi_info->rpi_proof_of_payment)): ?>
                                                    <div class="document-container">
                                                        <a href="<?= base_url($rpi_info->rpi_proof_of_payment) ?>" target="_blank" class="btn btn-outline-success w-100 document-link">
                                                            <i class="fas fa-check-circle text-success"></i>
                                                            <span>View Payment Proof</span>
                                                            <i class="fas fa-external-link-alt ms-auto"></i>
                                                        </a>
                                                    </div>
                                                <?php else: ?>
                                                    <div class="no-document-alert">
                                                        <i class="fas fa-file-alt"></i>
                                                        <p>No payment proof uploaded</p>
                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                        <?php endif; ?>
                                    </div>

                                    <!-- check if other data available or not -->
                                    <?php if ($rpi_info->rpi_full_paper): ?>
                                        <div class="row g-3 mb-4">
                                            <div class="col-md-6">
                                                <label class="form-label">
                                                    Full Paper
                                                </label>
                                                <?php if (!empty($rpi_info->rpi_full_paper)): ?>
                                                    <div class="document-container">
                                                        <a href="<?= base_url($rpi_info->rpi_full_paper) ?>" target="_blank" class="btn btn-outline-primary w-100 document-link">
                                                            <i class="fas fa-file-pdf text-danger"></i>
                                                            <span>View Full Paper</span>
                                                            <i class="fas fa-external-link-alt ms-auto"></i>
                                                        </a>
                                                    </div>
                                                <?php else: ?>
                                                    <div class="no-document-alert">
                                                        <i class="fas fa-file-alt"></i>
                                                        <p>No full paper uploaded</p>
                                                    </div>
                                                <?php endif; ?>
                                            </div>

                                            <div class="col-md-6">
                                                <label class="form-label">
                                                    Turnitin Report
                                                </label>
                                                <?php if (!empty($rpi_info->rpi_turnitin_report)): ?>
                                                    <div class="document-container">
                                                        <a href="<?= base_url($rpi_info->rpi_turnitin_report) ?>" target="_blank" class="btn btn-outline-primary w-100 document-link">
                                                            <i class="fas fa-file-pdf text-danger"></i>
                                                            <span>View Turnitin Report</span>
                                                            <i class="fas fa-external-link-alt ms-auto"></i>
                                                        </a>
                                                    </div>
                                                <?php else: ?>
                                                    <div class="no-document-alert">
                                                        <i class="fas fa-file-alt"></i>
                                                        <p>No Turnitin Report uploaded</p>
                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                        </div>

                                    <div class="mb-4">
                                        <label class="form-label">
                                            <i class="fas fa-file-pdf me-2"></i>Presentation Link
                                        </label>
                                        <?php if (!empty($rpi_info->rpi_presentation_link)): ?>
                                            <div class="document-container">
                                                <a href="<?= base_url($rpi_info->rpi_presentation_link) ?>" target="_blank" class="btn btn-outline-primary w-100 document-link">
                                                    <i class="fas fa-link text-danger"></i>
                                                    <span>View Link</span>
                                                    <i class="fas fa-external-link-alt ms-auto"></i>
                                                </a>
                                            </div>
                                        <?php else: ?>
                                            <div class="no-document-alert">
                                                <i class="fas fa-link"></i>
                                                <p>No Link uploaded</p>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                <?php endif; ?>

                                    <!-- Action Required Alert -->
                                <?php if ($rpi_info->rpi_status == 'approved'): ?>
                                    <div class="glass-alert">
                                        <div class="d-flex align-items-start">
                                            <div>
                                                <strong>Action Required:</strong> Please upload the following items:
                                                <ul class="mt-2 mb-0">
                                                    <li>Presentation Link</li>
                                                    <li>Turnitin Report</li>
                                                    <li>Full Report</li>
                                                    <li>Proof of Payment</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Button to Open Modal for Upload -->
                                    <button type="button" class="btn btn-primary w-100 py-2 mt-3" data-bs-toggle="modal" data-bs-target="#uploadModal">
                                        <i class="fas fa-upload me-2"></i> Upload Required Items
                                    </button>


                                <?php elseif ($rpi_info->rpi_status == 'Draft' || $rpi_info->rpi_status == 'returned'): ?>
                                    <hr>
                                    <div class="text-center mt-4">
                                        <!-- Display Update Button -->
                                        <a href="<?= base_url('participant/research_project/get-rp-update-form/') . $rpi_info->rpi_id ?>" type="button" class="btn btn-primary w-100 py-2 mt-3">
                                            <i class="fas fa-edit me-2"></i> Update Project Details
                                        </a>
                                    </div>

                                <?php elseif ($rpi_info->rpi_status == 'Full Report Draft' || $rpi_info->rpi_status == 'Payment Rejected'): ?>
                                    <hr>
                                    <div class="text-center mt-4">
                                        <!-- Display Update Button -->
                                        <a href="<?= base_url('participant/research_project/get-rp-update-full-rp-form/') . $rpi_info->rpi_id ?>" type="button" class="btn btn-primary w-100 py-2 mt-3">
                                            <i class="fas fa-edit me-2"></i> Update Report Details
                                        </a>
                                    </div>
                                <?php elseif ($rpi_info->rpi_status == 'Minor Correction' || $rpi_info->rpi_status == 'Major Correction' || $rpi_info->rpi_status == 'Correction Draft'): ?>
                                    <hr>
                                    <div class="text-center mt-4">
                                        <!-- Display Update Button -->
                                        <a href="<?= base_url('participant/research_project/get-rp-make-correction/') . $rpi_info->rpi_id ?>" type="button" class="btn btn-primary w-100 py-2 mt-3">
                                            <i class="fas fa-edit me-2"></i> Update Report Details
                                        </a>
                                    </div>
                                <?php else: ?>
                                    <!-- Display Nothing -->
                                <?php endif; ?>

                            </div>

                                <!-- Right Section -->
                                <div class="col-md-6">
                                    <h6 class="section-title">Research Team</h6>

                                    <div class="card mb-4 border-0 shadow-sm">
                                        <div class="card-header table-header">
                                            <h6 class="mb-0 text-center">
                                                <i class="fas fa-user-graduate me-2"></i>Presenter
                                            </h6>
                                        </div>
                                        <div class="card-body bg-light">
                                            <div class="d-flex align-items-center justify-content-center py-3">
                                                <div class="avatar-container me-3">
                                                    <div style="width: 48px; height:48px; background-color: #1e3c72; color: white; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 18px;">
                                                        <?= strtoupper(substr($team_presentor->rrt_name, 0, 1)) ?>
                                                    </div>
                                                </div>
                                                <div class="presenter-info">
                                                    <h5 class="mb-0"><?= $team_presentor->rrt_name ?></h5>
                                                    <span class="badge bg-primary">Main Presenter</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card border-0 shadow-sm">
                                        <div class="card-header table-header">
                                            <h6 class="mb-0 text-center">
                                                <i class="fas fa-users me-2"></i>Team Members
                                            </h6>
                                        </div>
                                        <div class="card-body p-0">
                                            <ul class="list-group list-group-flush">
                                                <?php foreach ($team_members as $index => $members): ?>
                                                    <li class="list-group-item d-flex align-items-center">
                                                        <div class="avatar-container me-3">
                                                            <div style="width: 36px; height: 36px; background-color: <?= sprintf('#%06X', mt_rand(0, 0xFFFFFF)) ?>; color: white; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 16px;">
                                                                <?= strtoupper(substr($members->rrt_name, 0, 1)) ?>
                                                            </div>
                                                        </div>
                                                        <div class="member-info">
                                                            <h6 class="mb-0"><?= $members->rrt_name ?></h6>
                                                            <small class="text-muted">Team Member #<?= $index + 1 ?></small>
                                                        </div>
                                                    </li>
                                                <?php endforeach; ?>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- </form> -->
                    </div>
                </div>
            </div>
        </div>
    </div>

<!-- Upload Modal with Enhanced Styling -->
<div class="modal fade" id="uploadModal" tabindex="-1" aria-labelledby="uploadModalLabel">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="uploadModalLabel">
                    <i class="fas fa-upload me-2"></i>Upload Required Items
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="uploadForm" enctype="multipart/form-data">
                <?= csrf_field() ?>

                <div class="modal-body">
                    <div class="mb-4">
                        <label for="project_link" class="form-label">Project Presentation Link</label>
                        <input type="url" class="form-control" id="project_link" name="project_link"
                            placeholder="Enter URL to presentation" required>
                    </div>

                    <div class="mb-4">
                        <label class="form-label">Turnitin Report</label>
                        <label for="turnitin_report" class="btn-upload">
                            <input type="file" class="form-control" id="turnitin_report" name="turnitin_report" accept=".pdf" required>
                        </label>
                        <small class="file-name text-muted"></small>
                    </div>

                    <div class="mb-4">
                        <label class="form-label">Full Report</label>
                        <label for="full_report" class="btn-upload">
                            <input type="file" class="form-control" id="full_report" name="full_report">
                        </label>
                        <small class="file-name text-muted"></small>
                    </div>

                    <!-- Admin Bank Details -->
                    <div class="mb-4 p-4 rounded bank-details">
                        <h5 class="mb-3">
                            Payment Details
                        </h5>
                        <div class="row">
                            <div class="col-md-6">
                                <p class="mb-2"><strong>Account Name:</strong> ABC Research Conference</p>
                                <p class="mb-2"><strong>Bank Name:</strong> XYZ Bank</p>
                            </div>
                            <div class="col-md-6">
                                <p class="mb-2"><strong>Account Number:</strong> 123-456-789</p>
                                <p class="mb-2"><strong>Reference:</strong> [Your Project ID]</p>
                            </div>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="form-label">Proof of Payment</label>
                        <label for="proof_of_payment" class="btn-upload">
                            <input type="file" class="form-control file-input-hidden" id="proof_of_payment" name="proof_of_payment" accept=".pdf, .jpg, .jpeg, .png">
                        </label>
                        <small class="file-name text-muted"></small>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        <i class="fas fa-times me-1"></i> Close
                    </button>
                    <button type="button" class="btn btn-warning" id="draftBtn">
                        <i class="fas fa-save me-1"></i> Save as Draft
                    </button>
                    <button type="submit" class="btn btn-primary" id="submitBtn">
                        <i class="fas fa-paper-plane me-1"></i> Submit
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

  <!-- jQuery (required for Select2 and dynamic elements) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Select2 -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>

    
    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    $(document).ready(function() {
        // Handle form submission
        $("#uploadForm").submit(function(e) {
            e.preventDefault(); // Prevent default form submission

            Swal.fire({
                title: "Are you sure?",
                text: "Do you want to submit this research project?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, submit it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    submitForm("<?= base_url('participant/research_project/update_full_researh_project') ?>");
                }
            });
        });

        // Handle draft button click
        $("#draftBtn").click(function() {
            Swal.fire({
                title: "Save as Draft?",
                text: "Your progress will be saved as a draft.",
                icon: "info",
                showCancelButton: true,
                confirmButtonColor: "#ffc107",
                cancelButtonColor: "#6c757d",
                confirmButtonText: "Save as Draft"
            }).then((result) => {
                if (result.isConfirmed) {
                    submitForm("<?= base_url('participant/research_project/draft_full_research_project') ?>");
                }
            });
        });

        function submitForm(url) {
            var formData = new FormData($("#uploadForm")[0]); // Get form data

            $.ajax({
                url: url, // CI4 Controller
                type: "POST",
                data: formData,
                processData: false,
                contentType: false,
                dataType: "json",
                beforeSend: function() {
                    $("#uploadStatus").html('<p class="text-info">Processing...</p>');
                },
                success: function(response) {

                    // 🔑 Refresh CSRF Token if sent back by server
                    if (response.csrfToken) {
                        $('input[name="<?= csrf_token() ?>"]').val(response.csrfToken);
                    }

                    if (response.success) {
                        Swal.fire({
                            title: "Success!",
                            text: response.message,
                            icon: "success",
                            confirmButtonText: "OK"
                        }).then(() => {
                            location.reload(); // Reload to reset form
                            // $("#uploadForm")[0].reset(); // Reset form
                            // $("#uploadModal").modal("hide"); // Close modal
                        });
                    } else {
                        Swal.fire({
                            title: "Error!",
                            text: response.message,
                            icon: "error"
                        });
                    }
                },
                error: function(xhr, status, error) {
                    Swal.fire({
                        title: "Error!",
                        text: "An error occurred: " + error,
                        icon: "error"
                    });
                }
            });
        }

        // Add to your existing JavaScript
        $('.btn-upload input[type="file"]').change(function() {
            const fileName = $(this).val().split('\\').pop();
            const container = $(this).closest('.mb-4'); // parent block
            const fileNameDisplay = container.find('.file-name');

            if (fileName) {
                fileNameDisplay.text(fileName).show();
            } else {
                fileNameDisplay.text('').hide();
            }
        });

    });
</script>