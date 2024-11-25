//import React
import React from 'react';

//import layout
import LayoutAccount from '../../../Layouts/Account';

//import component Head and usePage
import { Head, usePage } from '@inertiajs/react';

//import permissions
import hasAnyPermission from '../../../Utils/Permissions';

//import chart js
import {
    Chart as ChartJS,
    CategoryScale,
    LinearScale,
    PointElement,
    LineElement,
    Title,
    Tooltip,
    Filler,
    Legend,
} from 'chart.js';

//import react chart js
import { Line } from 'react-chartjs-2';
import ChartWithFilters from '../../../Components/organism/ChartWithFilters';
import LogCard from './LogCard.jsx';

//register chart
ChartJS.register(
    CategoryScale,
    LinearScale,
    PointElement,
    LineElement,
    Title,
    Tooltip,
    Filler,
    Legend
);

export default function Dashboard() {

    //destruct props
    const { auth, count, chart } = usePage().props;

    //option chart
    const options = {
        responsive: true,
        plugins: {
            legend: {
                position: 'top',
            },
            title: {
                display: true,
                text: `STATISTIC REVENUE : ${new Date().getFullYear()}`,
            },
        },
    };

    //data chart
    const data = {
        labels: chart.month_name,
        datasets: [
            {
                fill: true,
                label: 'REVENUE',
                backgroundColor: '#bccad8',
                data: chart.grand_total
            },
        ],
    };

    // Log data for the LogCard component
    const logData = [
        { time: '11:21 AM', customer: 'Jansen Udau', jenis: 'BD', jumlah: '2 Org', profit: 'Rp 150.000' },
        { time: '10:42 AM', customer: 'Stepanus Lugan', jenis: 'DC', jumlah: '1 Org', profit: 'Rp 45.000' },
        { time: '09:38 AM', customer: 'Kristoper Jaser...', jenis: 'VC', jumlah: '1 pcs', profit: 'Rp 45.000' },
        { time: '07:18 AM', customer: 'Hamid Rahmad...', jenis: 'VC', jumlah: '3 pcs', profit: 'Rp 245.000' },
    ];

    const monthlyData = {
        labels: [
            'January', 'February', 'March', 'April', 'May', 'June',
            'July', 'August', 'September', 'October', 'November', 'December'
        ],
        datasets: [
            {
                label: 'Voucher',
                data: [100000, 200000, 150000, 250000, 300000, 350000, 400000, 450000, 500000, 550000, 600000, 650000],
                backgroundColor: '#007bff',
            },
            {
                label: 'Broadband',
                data: [120000, 220000, 180000, 280000, 320000, 380000, 420000, 470000, 520000, 570000, 620000, 670000],
                backgroundColor: '#28a745',
            },
            {
                label: 'Dedicated',
                data: [90000, 190000, 140000, 240000, 290000, 340000, 390000, 440000, 490000, 540000, 590000, 640000],
                backgroundColor: '#ffc107',
            },
            {
                label: 'Total Income',
                data: [150000, 250000, 200000, 300000, 350000, 400000, 450000, 500000, 550000, 600000, 650000, 700000],
                backgroundColor: '#dc3545',
            },
        ],
    };

    const monthlyOptions = {
        responsive: true,
        plugins: {
            legend: {
                position: 'top',
            },
            title: {
                display: true,
                text: 'Monthly Income Chart',
            },
        },
    };

    return (
        <>
            <Head>
                <title>Dashboard - Geek Store</title>
            </Head>
            <LayoutAccount>

                <div className="row mt-4">
                    <div className="col-12 col-md-12 col-lg-12 mb-4">
                        <div className="alert alert-success border-0 shadow-sm mb-0">
                            Selamat Datang, <strong>{auth.user.name}</strong>
                        </div>
                    </div>
                </div>

                {hasAnyPermission(['dashboard.statistics']) &&
                    <div className="row mt-2">
                        <div className="col-12 col-lg-3 mb-4">
                            <div className="card border-0 shadow-sm overflow-hidden">
                                <div className="card-body p-0 d-flex align-items-center">
                                    <div className="bg-primary py-4 px-5 mfe-3" style={{ width: "130px" }}>
                                        <i className="fas fa-circle-notch fa-spin fa-2x text-white"></i>
                                    </div>
                                    <div>
                                        <div className="text-value text-primary">{count.unpaid}</div>
                                        <div className="text-muted text-uppercase font-weight-bold small">
                                            UNPAID
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div className="col-12 col-lg-3 mb-4">
                            <div className="card border-0 rounded shadow-sm overflow-hidden">
                                <div className="card-body p-0 d-flex align-items-center">
                                    <div className="bg-success py-4 px-5 mfe-3" style={{ width: "130px" }}>
                                        <i className="fas fa-check-circle fa-2x text-white"></i>
                                    </div>
                                    <div>
                                        <div className="text-value text-success">{count.paid}</div>
                                        <div className="text-muted text-uppercase font-weight-bold small">
                                            PAID
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div className="col-12 col-lg-3 mb-4">
                            <div className="card border-0 rounded shadow-sm overflow-hidden">
                                <div className="card-body p-0 d-flex align-items-center">
                                    <div className="bg-warning py-4 px-5 mfe-3" style={{ width: "130px" }}>
                                        <i className="fas fa-exclamation-triangle fa-2x text-white"></i>
                                    </div>
                                    <div>
                                        <div className="text-value text-warning">{count.expired}</div>
                                        <div className="text-muted text-uppercase font-weight-bold small">
                                            EXPIRED
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div className="col-12 col-lg-3 mb-4">
                            <div className="card border-0 rounded shadow-sm overflow-hidden">
                                <div className="card-body p-0 d-flex align-items-center">
                                    <div className="bg-danger py-4 px-5 mfe-3" style={{ width: "130px" }}>
                                        <i className="fas fa-times fa-2x text-white"></i>
                                    </div>
                                    <div>
                                        <div className="text-value text-danger">{count.cancelled}</div>
                                        <div className="text-muted text-uppercase font-weight-bold small">
                                            CANCELLED
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                }

                {hasAnyPermission(['dashboard.chart']) &&
                    <div className="row mt-2">
                        <div className="col-12 col-md-9 col-lg-9 mb-4">
                            <div className="card border-0 shadow-sm">
                                <i className="fa fa-chart-bar"></i> CHART HARIAN {new Date().getFullYear()} - {new Date().toLocaleDateString('id-ID', { weekday: 'long', day: 'numeric', month: 'long' })}
                                <div className="card-body">
                                    <ChartWithFilters />;
                                </div>
                            </div>
                        </div>
                    </div>
                }

            </LayoutAccount>
        </>
    )

}