const grid = document.querySelector(".gridContainer")
const userInput = document.getElementById("quantity")
const resetButton = document.querySelector(".reset")


let clickCounter
let matrix
let gridSize
let divs
let endPoints

function updateGrid() {
    grid.innerHTML = ""
    clickCounter = 0
    matrix = []
    divs = []
    endPoints = []
    
    if (userInput.value < 2) gridSize = 2
    else if (userInput.value > 40) gridSize = 40
    else gridSize = parseInt(userInput.value)
    
    grid.style.setProperty("grid-template-columns", `repeat(${gridSize}, 2fr)`)
    grid.style.setProperty("grid-template-rows", `repeat(${gridSize}, 2fr)`)

    matrix = new Array(gridSize).fill(0)
    for (let i = 0; i < matrix.length; i++) {
        matrix[i] = new Array(gridSize).fill(0)
    }
    
    for (let i = 0; i < gridSize * gridSize; i++) {
        const div = document.createElement("div")
        divs.push(div)
        let wall = Math.random()
        if(wall > 0.3) {
            div.setAttribute("class", "square")
        } else {
            div.setAttribute("class", "wall")
            j = i % gridSize
            k = (i - j) / gridSize
            matrix[k][j] = -1
        }
        div.setAttribute("id", i)
        grid.appendChild(div)
    }
}

function theGrid() {
    grid.innerHTML = ""
    userInput.value = ""
    grid.style.setProperty("grid-template-columns", `repeat(16, 2fr)`)
    grid.style.setProperty("grid-template-rows", `repeat(16, 2fr)`)
    createGrid()
}

const square = document.querySelector("div")
square.addEventListener("click", function(event) {
    if(clickCounter < 2 && event.target.classList != "wall") {
        event.target.classList.replace("square", "color")
        start = event.target.classList
        console.log(event.target.id)
        console.log(start)
        endPoints.push(event.target.id)
        clickCounter++
    } 
    if(clickCounter == 2) {
        let j1 = endPoints[0] % gridSize
        let k1 = (endPoints[0] - j1) / gridSize
        let j2 = endPoints[1] % gridSize
        let k2 = (endPoints[1] - j2) / gridSize
        pathfinder(matrix, k1, j1, k2, j2)
        clickCounter++
    }
})

function pathfinder(leeMatrix, x1, y1, x2, y2) {
    let toVisit = [[x1, y1]]

    while(toVisit.length) { 
        x = toVisit[0][0]
        y = toVisit[0][1]

        for (let i = x-1; i < x+2; i++)  {
            for (let j = y-1; j < y+2; j++) {
                if (neighbourCheck(leeMatrix, i,j, x1, y1, 0)) {
                    leeMatrix[i][j] = leeMatrix[x][y] + 1
                    toVisit.push([i, j])
                }
            }
        }

        let shift = toVisit.shift()
    }
    console.log("FINAL MATRIX : \n",leeMatrix)
    highlightPath(leeMatrix, x2, y2)
}

let neighbourCheck = function(matrix, i, j, x1, y1, value) {
    return matrix[i] && (matrix[i][j] === value) && !(i === x && j === y) &&
           !(i === x1 && j === y1) && (i == x || j == y)
}

let highlightPath = function(matrix, x, y) {
    let pathValue = matrix[x][y]
    showMap()
    
    loop1:
        while(true) {
            loop2:
                for (let i = x - 1; i < x + 2; i++) {
                    for (let j = y - 1; j < y + 2; j++) {
                        if(i >= 0 && j >= 0 && i <= gridSize && j <= gridSize) {
                            if(pathValue - 1 == matrix[i][j]) {
                                pathValue = matrix[i][j]
                                position = i * gridSize + j
                                divs[position].setAttribute("class", "path")
                                pathValue = matrix[i][j]
                                x = i
                                y = j
                                break loop2
                            }
                        }
                    }
                }
                
            if (pathValue <= 1) {
                break loop1
            }
        }
        if(pathValue == -1) console.log("Path not Found")
}

function showMap() {
    for (let i = 0; i < gridSize; i++) {
        for (let j = 0; j < gridSize; j++) {
            position = i * gridSize + j
            divs[position].innerHTML += matrix[i][j]
        }
    }
}

userInput.addEventListener("change", updateGrid)