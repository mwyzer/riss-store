import React from 'react';

const LogCard = ({ title, date, data, onEdit }) => {
    return (
        <div className="card border-0 shadow-sm log-card">
            {/* Card Header */}
            <div className="card-header d-flex justify-content-between align-items-center bg-primary text-white">
                <span>
                    {title}: {date}
                </span>
                <button onClick={onEdit} className="btn btn-success btn-sm">
                    Ubah
                </button>
            </div>

            {/* Card Body */}
            <div className="card-body p-0">
                <table className="table table-dark table-hover mb-0">
                    <thead>
                        <tr>
                            <th>Jam</th>
                            <th>Customer</th>
                            <th>Jenis</th>
                            <th>Jumlah</th>
                            <th>Profit</th>
                            <th>Lihat</th>
                        </tr>
                    </thead>
                    <tbody>
                        {data.map((item, index) => (
                            <tr key={index}>
                                <td>{item.time}</td>
                                <td>{item.customer}</td>
                                <td>
                                    <span
                                        className={`badge ${
                                            item.jenis === 'BD'
                                                ? 'bg-primary'
                                                : item.jenis === 'DC'
                                                ? 'bg-purple'
                                                : 'bg-pink'
                                        }`}
                                    >
                                        {item.jenis}
                                    </span>
                                </td>
                                <td>{item.jumlah}</td>
                                <td className="text-success">{item.profit}</td>
                                <td>
                                    <button className="btn btn-sm btn-outline-light">
                                        <i className="fa fa-eye"></i>
                                    </button>
                                </td>
                            </tr>
                        ))}
                    </tbody>
                </table>
            </div>
        </div>
    );
};

export default LogCard;
