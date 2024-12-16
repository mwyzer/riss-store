import React from "react";
import LayoutAccount from '../../../Layouts/Account';
import { Head, usePage, Link } from '@inertiajs/react';
import hasAnyPermission from '../../../Utils/Permissions';
import Search from '../../../Shared/Search';
import Pagination from '../../../Shared/Pagination';
import Delete from '../../../Shared/Delete';

export default function WarnaIndex() {

    const { warnas } = usePage().props;

    return(
        <>
            <Head>
                <title>Warnas - Geek Store</title>
            </Head>
            <LayoutAccount>
                <div className="row mt-5">
                    <div className="col-md-8">
                        <div className="row">
                            <div className="col-md-3 col-12 mb-2">
                                <Link href="/account/warnas/create" className="btn btn-md btn-success border-0 shadow w-100" type="button">
                                    <i className="fa fa-plus-circle me-2"></i>
                                    Tambah
                                </Link>
                            </div>
                            <div className="col-md-9 col-12 mb-2">
                                <Search URL={'/account/warnas'}/>
                            </div>
                        </div>
                    </div>
                </div>
                <div className="row mt-2 mb-4">
                    <div className="col-12">
                        <div className="card border-0 rounded shadow-sm border-top-success">
                            <div className="card-header">
                                <span className="font-weight-bold"><i className="fa fa-palette"></i> Warnas</span>
                            </div>
                            <div className="card-body">
                                <div className="table-responsive">
                                    <table className="table table-bordered table-striped table-hovered">
                                        <thead>
                                        <tr>
                                            <th scope="col" style={{ width: '5%' }}>No.</th>
                                            <th scope="col" style={{ width: '15%' }}>Name</th>
                                            <th scope="col" style={{ width: '15%' }}>Color</th>
                                            <th scope="col" style={{ width: '15%' }}>Actions</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            {warnas.data.map((warna, index) => (
                                                <tr key={index}>
                                                    <td className="text-center">{++index + (warnas.current_page-1) * warnas.per_page}</td>
                                                    <td>{warna.name}</td>
                                                    <td className="text-center">
                                                        <img src={warna.image} className="rounded-circle" width={'30'}/>
                                                    </td>
                                                    <td className="text-center">
                                                        {hasAnyPermission(['warnas.edit']) &&
                                                            <Link href={`/account/warnas/${warna.id}/edit`} className="btn btn-primary btn-sm me-2"><i className="fa fa-pencil-alt"></i></Link>
                                                        }
                                                        {hasAnyPermission(['warnas.delete']) &&
                                                           <Delete URL={'/account/warnas'} id={warna.id} />
                                                        }
                                                    </td>
                                                </tr>
                                            ))}
                                        </tbody>
                                    </table>
                                </div>
                                <Pagination links={warnas.links} align={'end'}/>
                            </div>
                        </div>
                    </div>
                </div>
            </LayoutAccount>
        </>
    )
}
