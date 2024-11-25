import React from 'react';
import LayoutAccount from '../../../Layouts/Account';
import { Head, usePage } from '@inertiajs/react';
import hasAnyPermission from '../../../Utils/Permissions';
import {
    Chart as ChartJS,
    CategoryScale,
    LinearScale,
    PointElement,
    LineElement,
    BarElement,
    Title,
    Tooltip,
    Filler,
    Legend,
} from 'chart.js';
import { Line, Bar } from 'react-chartjs-2'; // Import both Line and Bar components
import ChartWithFilters from '../../../Components/organism/ChartWithFilters';
import LogCard from './LogCard.jsx';

// Register Chart.js modules
ChartJS.register(
    CategoryScale,
    LinearScale,
    PointElement,
    LineElement,
    BarElement, // Register BarElement for Bar charts
    Title,
    Tooltip,
    Filler,
    Legend
);

export default function Dashboard() {
    const { auth, count, chart } = usePage().props;

    // Log data for debugging
    console.log('auth:', auth);
    console.log('count:', count);
    console.log('chart:', chart);

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
                    <div className="col-12">
                        <div className="alert alert-success border-0 shadow-sm">
                            Selamat Datang, <strong>{auth.user.name}</strong>
                        </div>
                    </div>
                </div>

                {/* Monthly Chart */}
                <div className="row mt-2">
                    <div className="col-12 mb-4">
                        <div className="card border-0 shadow-sm">
                            <div className="card-header bg-primary text-white">
                                <h5>Chart Bulanan</h5>
                            </div>
                            <div className="card-body">
                                <Bar data={monthlyData} options={monthlyOptions} />
                            </div>
                        </div>
                    </div>
                </div>
            </LayoutAccount>
        </>
    );
}
