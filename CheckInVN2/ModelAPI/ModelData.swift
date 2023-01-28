//
//  ModelData.swift
//  CheckInVN2
//
//  Created by PPPP on 17/01/2023.
//

import Foundation

class ViewModel: ObservableObject {
    @Published var users: [User] = []
    @Published var provinces: [Province] = []
    @Published var coorFamous: [Famous] = []
    var ipAPI = "192.168.1.10"
    func fetchUser() {
        guard let url = URL(string: "http://\(ipAPI)/landmark_api/api/UserAPI/read_user.php") else {
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
    
    func fetchProvince() {
        guard let url = URL(string: "http://\(ipAPI)/landmark_api/api/provinceAPI/read_province.php") else {
            return
        }
        let task = URLSession.shared.dataTask(with: url) {[weak self] data, _,error in
            guard let data = data, error == nil else {
                return
            }
            do {
                let provinces = try JSONDecoder().decode([Province].self, from: data)
                DispatchQueue.main.async {
                    self?.provinces = provinces
                }
            }
            catch {
                print(error)
            }
        }
        task.resume()
    }
    
    func fetchFamous() {
        guard let url = URL(string: "http://\(ipAPI)/landmark_api/api/FamousPlaceAPI/read_coorFamous.php") else {
            return
        }
        let task = URLSession.shared.dataTask(with: url) {[weak self] data, _,error in
            guard let data = data, error == nil else {
                return
            }
            do {
                let coorFamous = try JSONDecoder().decode([Famous].self, from: data)
                DispatchQueue.main.async {
                    self?.coorFamous = coorFamous
                }
            }
            catch {
                print(error)
            }
        }
        task.resume()
    }
}

