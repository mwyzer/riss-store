module.exports = {
  transform: {
    "^.+\\.[tj]sx?$": "babel-jest"
  },
  testEnvironment: "jsdom",
  moduleFileExtensions: ["js", "jsx", "ts", "tsx"],
  moduleNameMapper: {
    "^@inertiajs/(.*)$": "<rootDir>/node_modules/@inertiajs/$1"
  },
};
