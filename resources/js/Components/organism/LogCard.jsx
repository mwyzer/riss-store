import React from 'react';

// Reusable LogCard Component
const LogCard = ({ title, date, data, onEdit }) => {
    return (
        <div className="card border-0 shadow-sm">
            <div className="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                <span>{title}: {date}</span>
                <button onClick={onEdit} className="btn btn-success btn-sm">Ubah</button>
            </div>
            <div className="card-body p-0">
                <table className="table table-hover table-dark mb-0">
                    <thead>
                        <tr>
                            <th scope="col">Jam</th>
                            <th scope="col">Customer</th>
                            <th scope="col">Jenis</th>
                            <th scope="col">Jumlah</th>
                            <th scope="col">Profit</th>
                            <th scope="col">Lihat</th>
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
                                            item.jenis === 'BD' ? 'bg-primary' :
                                            item.jenis === 'DC' ? 'bg-purple' : 
                                            item.jenis === 'VC' ? 'bg-pink' : ''
                                        } text-white`}
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
