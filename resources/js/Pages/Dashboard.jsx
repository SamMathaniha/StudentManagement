import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import { Head } from '@inertiajs/react';
import { FaUserGraduate } from 'react-icons/fa'; // Importing the icon


export default function Dashboard({ auth }) {
    return (
        <AuthenticatedLayout
            user={auth.user}
            header={<h2 className="font-semibold text-xl text-gray-800 leading-tight">Student Management System</h2>}
            
        >
            <Head title="Dashboard" /> 

            <div className="py-12">

                <div className="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div className="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div className="p-6 text-gray-900">You're logged in!</div>
                 
                    </div>    
                </div>
                {/* Box with an icon representing students */}
            <div className="py-3 flex justify-center  mt-10">
                <div className="bg-gray-200 rounded-full p-5">
                    <FaUserGraduate className="text-5xl text-blue-500" />
                </div>
            </div>
                 {/* Button to add student details */}
                <div className="py-3 flex justify-center">
                   <a href="/dashboard/students" className="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                      View Student Details
                  </a>
              </div>
            </div>
        </AuthenticatedLayout>
    );
}
