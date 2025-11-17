import { createContext } from "react";
import { useState } from "react";
import { useContext } from "react";

const StateContext = createContext({
    currentUser: null,
    token: null,
    notification: null,
    setUser: () => { },
    setToken: () => { },
    setNotification: () => { },
});

export const ContextProvider = ({ children }) => { 
    const [user, setUser] = useState({});
    const [notification, _setNotification] = useState('');
    const [token, _setToken] = useState(localStorage.getItem('ACCESS_TOKEN'));
    // const [token, _setToken] = useState(123);
    // debugger;
    const setToken = (token) => {
        _setToken(token);
        if (token) { 
            localStorage.setItem('ACCESS_TOKEN', token);
        } else {
            localStorage.removeItem('ACCESS_TOKEN');
        }
    }

    const setNotification = (message) => { 
        _setNotification(message);
        console.log('notification is set!!!!');
        setTimeout(() => { 
            _setNotification('');
        }, 10000);
    }
    return (
        <StateContext.Provider value={{
            user,
            token,
            notification,
            setUser,
            setToken,
            setNotification,
        }}>
            {children}
        </StateContext.Provider>
    )
} 

export const UseStateContext = () => useContext(StateContext);