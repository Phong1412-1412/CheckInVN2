//
//  ModelData.swift
//  CheckInVN2
//
//  Created by PPPP on 17/01/2023.
//

import Foundation

class UserViewModel: ObservableObject {
    @Published var users: [User] = []
    var ipAPI = "192.168.1.5"
    func fetch() {
        guard let url = URL(string: "http://192.168.1.5/landmark_api/api/UserAPI/read_user.php") else {
            return
        }
        let task = URLSession.shared.dataTask(with: url) {[weak self] data, _,error in
            guard let data = data, error == nil else {
                return
            }
            do {
                let users = try JSONDecoder().decode([User].self, from: data)
                DispatchQueue.main.async {
                    self?.users = users
                }
            }
            catch {
                print(error)
            }
        }
        task.resume()
    }
}

