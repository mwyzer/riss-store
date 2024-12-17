import React from 'react';
import { Link } from '@inertiajs/react';
import { Wallet, Plus } from 'lucide-react';

export default function WalletProfile() {
    return (
        <div className="container mb-0 pb-2" style={{ marginTop: 'auto' }}>
            <div className="row justify-content-center">
                <div className="col-12" style={{ maxWidth: '400px' }}>
                    <div className="card border-0 shadow-sm" style={{ borderRadius: '25px', background: '#FBFBFB' }}>
                        <div className="card-body position-relative p-3">
                            <div className="row align-items-center">
                                <div className="col-3">
                                    <div className="bg-primary rounded-circle d-flex align-items-center justify-content-center" style={{ width: '45px', height: '45px' }}>
                                        <Wallet className="text-white" size={24} />
                                    </div>
                                </div>
                                <div className="col-6">
                                    <p className="mb-0 text-muted" style={{ fontSize: '14px' }}>Saldo Anda</p>
                                    <h5 className="mb-0 fw-bold" style={{ color: '#4D4D4D' }}>Rp 350.000</h5>
                                    <div className="d-flex align-items-center mt-1">
                                        <div className="bg-primary rounded-circle d-flex align-items-center justify-content-center me-2" style={{ width: '16px', height: '16px', border: '2px solid #DFAF03' }}>
                                            <span className="text-white" style={{ fontSize: '10px' }}>P</span>
                                        </div>
                                        <span className="text-muted" style={{ fontSize: '14px' }}>20 Poin</span>
                                    </div>
                                </div>
                                <div className="col-3 text-end">
                                    <Link href="/top-up" className="btn btn-light rounded-circle p-2 mb-1" style={{ background: 'rgba(5, 63, 186, 0.1)' }}>
                                        <Plus className="text-primary" size={20} />
                                    </Link>
                                    <p className="mb-0 text-muted" style={{ fontSize: '12px' }}>Top Up</p>
                                </div>
                            </div>
                            <div className="position-absolute" style={{ width: '1px', height: '62px', background: '#DEDEDE', right: '85px', top: '6px' }}></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    );
}
