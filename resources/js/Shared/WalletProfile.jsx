import React from 'react';
import { Link } from '@inertiajs/react';

export default function WalletProfile() {
    return (
        <div className="container mt-5">
            <div className="row justify-content-center">
                <div className="col-12 col-md-6">
                    <div className="card border-0 shadow-sm">
                        <div className="card-body p-4">
                            <div className="row align-items-center">
                                <div className="col-8">
                                    <div className="d-flex align-items-center">
                                        <div className="bg-primary rounded-circle p-3 me-3">
                                            <i className="bi bi-wallet2 text-white fs-4"></i>
                                        </div>
                                        <div>
                                            <p className="text-muted mb-0">Saldo Anda</p>
                                            <h4 className="mb-0">Rp 350.000</h4>
                                            <div className="d-flex align-items-center mt-1">
                                                <div className="bg-primary rounded-circle p-1 me-2" style={{width: '20px', height: '20px'}}>
                                                    <span className="text-warning fw-bold" style={{fontSize: '0.7rem'}}>P</span>
                                                </div>
                                                <small className="text-muted">20 Poin</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div className="col-4 text-end">
                                    <Link href="/topup" className="btn btn-outline-primary rounded-circle p-2 mb-2">
                                        <i className="bi bi-plus fs-4"></i>
                                    </Link>
                                    <p className="mb-0"><small>Top Up</small></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    );
}

