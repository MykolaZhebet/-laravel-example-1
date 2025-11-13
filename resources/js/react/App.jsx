import { useState } from 'react';
function App() { 
    const [count, setCount] = useState(0);
    return (
        <div className="App">
            <div>
                <a href="">Logo</a>
            </div>
            <div>
                <button onClick={() => setCount((count) => count + 1)}>
                    Count is { count}
                </button>
            </div>
        </div>
    );
}

export default App