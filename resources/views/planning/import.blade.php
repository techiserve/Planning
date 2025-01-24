@extends('template.default')
<style>
        body {
      font-family: Arial, sans-serif;
      background-color: #f3f4f6;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
    }
    .form-container {
      background: #fff;
      padding: 20px 30px;
      border-radius: 8px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      width: 100%;
      max-width: 400px;
      text-align: center;
    }
    .form-container h2 {
      margin-bottom: 20px;
      color: #333;
    }
    .form-group {
      margin-bottom: 15px;
      text-align: left;
    }
    label {
      display: block;
      font-weight: bold;
      margin-bottom: 5px;
      color: #555;
    }
    input[type="file"] {
      width: 100%;
      padding: 10px;
      border: 1px solid #ddd;
      border-radius: 5px;
      background: #f9f9f9;
      cursor: pointer;
    }
    input[type="file"]:focus {
      outline: none;
      border-color: #007bff;
      background: #eef6ff;
    }
    .submit-btn {
      width: 100%;
      padding: 10px 15px;
      background-color: #007bff;
      border: none;
      border-radius: 5px;
      color: white;
      font-size: 16px;
      font-weight: bold;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }
    .submit-btn:hover {
      background-color: #0056b3;
    }
</style>
@section('content')
<div class="form-container">
    <h2>Upload Document</h2>
    <form action="/import-trucks" method="post" enctype="multipart/form-data">
    @csrf    
      <div class="form-group">
        <label for="file-upload">Choose a document:</label>
        <input type="file" id="file-upload" name="file" required>
      </div>
      <button type="submit" class="submit-btn">Submit</button>
    </form>
  </div>

@endsection
