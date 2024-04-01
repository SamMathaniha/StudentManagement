import { Link, Head } from '@inertiajs/react';
import "../../css/LoginRegister.css"; // Import your external CSS file

export default function Welcome({ auth, laravelVersion, phpVersion }) {
    return (
        <div className="BackgroundBody">
            <Head title="Welcome" />
            {/* Navigation bar */}
            <nav className="navbar">
                <div className="navbar-links">
                    {auth.user ? (
                        <Link href={route('dashboard')}>Dashboard</Link>
                    ) : (
                        <>
                            <Link href={route('login')}>Log in</Link>
                            <Link href={route('register')}>Register</Link>
                        </>
                    )}
                </div>
            </nav>

            {/* Text animation centered on the page */}
            <div className="centered-text-animation">
                Student Management System
            </div>
        </div>
    );
}
