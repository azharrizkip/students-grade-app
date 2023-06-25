@extends('layouts.app')

@section('content')
    <div class="container">
      <h1>Student Details</h1>
      <table class="student-details">
          <tr>
              <th>Name</th>
              <td>{{ $student->first_name }} {{ $student->last_name }}</td>
          </tr>
          <tr>
              <th>NIM</th>
              <td>{{ $student->student_id }}</td>
          </tr>
          <tr>
              <th>Email</th>
              <td>{{ $student->email }}</td>
          </tr>
      </table>

      <h2>Grades</h2>
      @if ($grades)
          <table class="grades">
              <tr>
                  <th>Quiz Score</th>
                  <td>{{ $grades->quiz }}</td>
              </tr>
              <tr>
                  <th>Assignment Score</th>
                  <td>{{ $grades->assignment }}</td>
              </tr>
              <tr>
                  <th>Attendance Score</th>
                  <td>{{ $grades->attendance }}</td>
              </tr>
              <tr>
                  <th>Practical Score</th>
                  <td>{{ $grades->practical }}</td>
              </tr>
              <tr>
                  <th>Final Exam Score</th>
                  <td>{{ $grades->final_exam }}</td>
              </tr>
              <tr>
                  <th>Final Score</th>
                  <td><b>{{ $grades->final_score }}</b></td>
              </tr>
              <tr>
                  <th>Final Grade</th>
                  <td><b>{{ $grades->final_grade }}</b></td>
              </tr>
          </table>
          <p>Grades already exist for this student.</p>
      @else
        <div class="score-form-container">
          <h2>Score Form</h2>
          <form action="{{ route('grades.store', $student->id) }}" method="POST">
            @csrf
            <div>
                <label for="quiz_score">Quiz Score ({{ $weights['quiz'] }}%)</label>
                <input type="number" name="quiz_score" id="quiz_score" step="0.01" required>
            </div>
            <div>
                <label for="assignment_score">Assignment Score ({{ $weights['assignment'] }}%)</label>
                <input type="number" name="assignment_score" id="assignment_score" step="0.01" required>
            </div>
            <div>
                <label for="attendance_score">Attendance Score ({{ $weights['attendance'] }}%)</label>
                <input type="number" name="attendance_score" id="attendance_score" step="0.01" required>
            </div>
            <div>
                <label for="practical_score">Practical Score ({{ $weights['practical'] }}%)</label>
                <input type="number" name="practical_score" id="practical_score" step="0.01" required>
            </div>
            <div>
                <label for="final_exam_score">Final Exam Score ({{ $weights['final_exam'] }}%)</label>
                <input type="number" name="final_exam_score" id="final_exam_score" step="0.01" required>
            </div>
            <button type="submit">Submit</button>
          </form>
        </div>
      @endif

      @if (session('success'))
          <div class="alert alert-success">
              {{ session('success') }}
          </div>
      @endif

      <div class="chart-container">
        <div id="scoresChart"></div>
      </div>
    </div>

    <script>
        google.charts.load('current', { packages: ['corechart'] });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['Category', 'Score'],
                ['Quiz', {{ $grades ? $grades->quiz : 0 }}],
                ['Assignment', {{ $grades ? $grades->assignment : 0 }}],
                ['Attendance', {{ $grades ? $grades->attendance : 0 }}],
                ['Practical', {{ $grades ? $grades->practical : 0 }}],
                ['Final Exam', {{ $grades ? $grades->final_exam : 0 }}]
            ]);

            var options = {
                title: 'Scores',
                backgroundColor: { fill: 'transparent' },
                'width':600,
                'height':400
            };

            var chart = new google.visualization.ColumnChart(document.getElementById('scoresChart'));
            chart.draw(data, options);
        }
    </script>
@endsection
