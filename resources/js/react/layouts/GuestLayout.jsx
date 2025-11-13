import { Outlet } from "react-router-dom";
export default function GuestLayuot() {
    return (
        <>
            Guest Layout
            <div>
                {/* Child routes will render here */}
                <Outlet />
            </div>
        </>
    );
}